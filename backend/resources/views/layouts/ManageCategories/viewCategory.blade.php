<x-layout>
    <x-slot name="title">{{ $category->name }} Details</x-slot>
    <x-slot name="header">{{ $category->name }} Details</x-slot>

    <div class="container">
        <div class="mb-3">
            <strong>ID:</strong> {{ $category->id }}
        </div>
        <div class="mb-3">
            <strong>Name:</strong> {{ $category->name }}
        </div>
        <div class="mb-3">
            <strong>Slug:</strong> {{ $category->slug }}
        </div>
        <div class="mb-3">
            <strong>Parent Category:</strong> {{ $category->parent ? $category->parent->name : '-' }}
        </div>
        <div class="mb-3">
            <strong>Order:</strong> {{ $category->order }}
        </div>
        <div class="mb-3">
            <strong>Description:</strong> {{ $category->description }}
        </div>
        <div class="mb-3">
            <strong>Created At:</strong> {{ $category->created_at }}
        </div>
        <div class="mb-3">
            <strong>Updated At:</strong> {{ $category->updated_at }}
        </div>
        <div class="mt-3">
            <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</x-layout>