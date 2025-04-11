<?php

namespace App\Controllers\Client;

use App\Controller;
use App\Models\Product;

class HomeController extends Controller
{
    private Product $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function index()
    {
        $page = $_GET['page'] ?? 1;
        $limit = $_GET['limit'] ?? 8;

        $data = $this->product->paginate($page, $limit);

        return view('client.home', [
            'products' => $data['data'] ?? [], // đảm bảo tránh null
            'title' => 'Trang chủ'
        ]);
    }
}
