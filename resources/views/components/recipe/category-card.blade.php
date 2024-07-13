@props(['category'])

<a href="#categories" class="bg-secondary rounded-lg p-4 flex flex-col items-center gap-2 hover:bg-secondary-900">
    <span class="text-primary font-medium">{{ $category->name }}</span>
</a>
