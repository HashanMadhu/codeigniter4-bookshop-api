<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    // The exact database table name we created earlier
    protected $table            = 'books';
    protected $primaryKey       = 'id';
    
    // Security check: Only allow outside code to change these columns (Mass Assignment Protection)
    protected $allowedFields    = ['title', 'author', 'price', 'stock_count'];

    // CodeIgniter will automatically log date/time timestamps when a book is created or updated
    protected $useTimestamps    = false;
}