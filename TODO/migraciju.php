<?php
Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email')->unique();
    $table->string('password');
    $table->timestamps();
});

Schema::create('todo_groups', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->string('name');
    $table->timestamps();
});

// Līdzīgi migrācijas varētu izveidot arī todo_lists, todo_items un shared_lists tabulām
?>