<!-- resources/views/todo.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Todo List</h1>
    <div class="add-task">
        <input type="text" v-model="newTask" placeholder="Enter task...">
        <button @click="addTask">Add Task</button>
    </div>
    <div class="task-list">
        <ul>
            <li v-for="(task, index) in tasks" :key="index">{{ task }}</li>
        </ul>
    </div>
</div>
@endsection
