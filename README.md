# 🛒 MicroStore  
### A Laravel Single-Table Web Application

---

## 📘 Introduction & Scenario

**MicroStore** is a web application developed using **Laravel (version 11/12)** and **MySQL**.  
It simulates a **small independent retailer** managing product inventory and displaying products online.  

The system provides:
- A **public-facing product listing** (`/`) for customers  
- An **admin dashboard** (`/admin`) for managing products: create, read, update, delete  

The application focuses on **Laravel fundamentals** without authentication, JavaScript, or CSS frameworks. All product data is stored in a **single database table**, designed in **first normal form (1NF)**.

---

## ✨ Key Features

- Public product listing on `/`  
- Admin dashboard for full CRUD operations  
- Server-side input validation  
- Product search functionality  
- Pagination for usability  
- Clean and accessible CSS styling (desktop-first, 1366×768)  
- Clear user feedback messages after actions  

---

## 🏗 MVC Architecture in Laravel

Laravel follows the **Model–View–Controller (MVC)** design pattern. This project demonstrates:

---

### 📦 Model (Data Layer)

The **Model** represents application data and communicates with the database via **Eloquent ORM**.

Example: `StoreItem` model

```php
class StoreItem extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock_quantity',
        'category',
        'is_active'
    ];
}


🎮 Controller (Application Logic)

The Controller handles requests, business logic, and coordinates between models and views.

Example: StoreItemController for storing products:


public function store(Request $request)
{
    $request->validate([
        'name' => 'required|max:255',
        'description' => 'required',
        'price' => 'required|numeric|min:0',
        'stock_quantity' => 'required|integer|min:0',
        'category' => 'required|max:100'
    ]);

    StoreItem::create($request->all());

    return redirect('/admin')->with('success', 'Product added successfully.');
}

Key Points:

Validates input on the server side

Handles redirection and user feedback

Keeps business logic separate from presentation

🎨 View (Presentation Layer)

The View layer displays data using Blade templates.

Example: resources/views/store/index.blade.php

@foreach ($items as $item)
    <div class="card">
        <h3>{{ $item->name }}</h3>
        <p>{{ $item->description }}</p>
        <strong>£{{ $item->price }}</strong>
    </div>
@endforeach


Blade Features Used:

@foreach loops for lists

@if for conditional content

Layout inheritance for consistent header, footer, and navigation

🧭 Routing & Navigation

Routing defines how users interact with the app:

Route::get('/', [StoreItemController::class, 'publicIndex']);
Route::prefix('admin')->group(function () {
    Route::get('/', [StoreItemController::class, 'adminIndex']);
    Route::get('/create', [StoreItemController::class, 'create']);
    Route::post('/store', [StoreItemController::class, 'store']);
    Route::get('/{item}/edit', [StoreItemController::class, 'edit']);
    Route::put('/{item}', [StoreItemController::class, 'update']);
    Route::delete('/{item}', [StoreItemController::class, 'destroy']);
});
