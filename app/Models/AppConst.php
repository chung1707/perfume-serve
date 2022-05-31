<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppConst extends Model
{
    use HasFactory;
    Const DEFAULT_PRODUCTS_IN_HOME = 6;
    const DEFAULT_PRODUCTS_PER_PAGE = 12;
    const DEFAULT_PRODUCTS_SEARCH = 3;
    const DEFAULT_RELATED_POSTS = 3;
    const DEFAULT_RELATED_PRODUCTS = 8;
    const DEFAULT_ORDER_PER_PAGE = 6;
    const DEFAULT_POST_PER_PAGE = 9;
    const TRANSACTION_CODE = 5;
    const DEFAULT_PER_ADMIN_PAGE = 10;
}
