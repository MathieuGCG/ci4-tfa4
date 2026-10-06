<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data['users'] = $this->userModel->findAll();
        return view('users/index', $data);
    }

    public function new()
    {
        helper(['form']);
        return view('users/new');
    }

public function create()
    {
        helper(['form']);

        $rules = [
            'username'  => 'required|is_unique[users.username]',
            'password'  => 'required|min_length[6]',
            'full_name' => 'required',
            'avatar'    => 'is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]|max_size[avatar,2048]',
        ];

        if (!$this->validate($rules)) {
            return view('users/new', ['validation' => $this->validator]);
        }

        $avatarName = $this->handleFileUpload('avatar');

        $this->userModel->save([
            'username'   => $this->request->getPost('username'),
            'password'   => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'full_name'  => $this->request->getPost('full_name'),
            'avatar'     => $avatarName,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/users')->with('message', 'User account created successfully.');
    }

    public function edit($id)
    {
        helper(['form']);
        $user = $this->userModel->find($id);

        if (!$user) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("User not found.");
        }

        return view('users/edit', ['user' => $user]);
    }

    public function update($id)
    {
        helper(['form']);

        $rules = [
            'username'  => "required|is_unique[users.username,id,{$id}]",
            'full_name' => 'required',
            'avatar'    => 'is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]|max_size[avatar,2048]',
        ];

        if (!$this->validate($rules)) {
            $user = $this->userModel->find($id);
            return view('users/edit', [
                'validation' => $this->validator,
                'user'       => $user,
            ]);
        }

        $data = [
            'username'  => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
        ];

        $avatarName = $this->handleFileUpload('avatar');
        if ($avatarName) {
            $data['avatar'] = $avatarName;
        }

        $this->userModel->update($id, $data);

        return redirect()->to('/users')->with('message', 'User account updated successfully.');
    }

    private function handleFileUpload(string $fieldName): ?string
    {
        $file = $this->request->getFile($fieldName);

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/avatars', $newName);

            // Crop and resize avatar into a 150x150 thumbnail
            \Config\Services::image()
                ->withFile(FCPATH . 'uploads/avatars/' . $newName)
                ->fit(150, 150, 'center')
                ->save(FCPATH . 'uploads/avatars/' . $newName);

            return $newName;
        }

        return null;
    }
}