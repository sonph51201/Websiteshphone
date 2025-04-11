<?php

namespace App;

class Controller
{
    public function validate($validation,$data,$rules)
    {
        $validation = $validation->make($data,$rules);
        $validation->validate();
        if($validation->fails()){
            return $validation->errors()->firstOfAll();
        }  
        return []; 
    }

    public function logError($masage)
    {
        $date = date('Y-m-d');
        error_log($masage, 3, "storage/logs/$date.log");
    }
    public function uploadFile(array $file, $folder = null)
    {
        $fileTmPath = $file['tmp_name'];
        $fileName = time() . '-' . $file['name'];
        $uploadDir = 'storage/uploads/' . $folder . '/';
        //Tạo thư mục nếu chưa tồn tại
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        //Đường dẫn đầy đủ để lưu file
        $destPath = $uploadDir . $fileName;
        //Di chuyển file từ thư mục tạm sang thư mục upload
        if (move_uploaded_file($fileTmPath, $destPath)) {
            return $destPath;
        }
        throw new \Exception('Upload file thất bại');
    }
}
