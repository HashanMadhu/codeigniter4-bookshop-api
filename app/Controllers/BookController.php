<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BookModel;
use CodeIgniter\API\ResponseTrait; // This trait adds helper tools for sending clean API responses as JSON

class BookController extends BaseController
{
    // This trait adds helper tools for sending clean API responses //use CodeIgniter\API\ResponseTrait;
    use ResponseTrait;

    // Action 1: Fetch and return all books
    public function index()
    {
        $model = new BookModel();
        
        // Grab all rows from the 'books' table
        $books = $model->findAll();

        // Send the data back as JSON with an HTTP 200 Success status code
        return $this->respond($books, 200);
    }

    // Action 2: Receive form data and create a new book
    public function create()
    {
        $model = new BookModel();

        // Capture incoming JSON or standard form fields from the frontend request
        $data = $this->request->getJSON(true) ?? $this->request->getPost();

        // Attempt to insert the data into the 'books' table
        if ($model->insert($data)) {
            // Send back a success message with HTTP 201 Created status code
            return $this->respond([
                'status'  => 201,
                'message' => 'Book added successfully!'
            ], 201);
        }

        // If something goes wrong, send back an error message
        return $this->fail('Failed to save the book data.', 400);
    }
}