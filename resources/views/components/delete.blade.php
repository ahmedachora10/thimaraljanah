@props(['route' => '', 'text' => ''])
<form method="POST" action="{{ $route }}">
    @csrf
    @method('DELETE')

    <a href="{{ $route }}" {{ $attributes->merge(['class' => 'border border-transparent rounded-md font-semibold text-md text-red-500']) }}
        onclick="if(confirm('are you sure?')) { event.preventDefault();
        this.closest('form').submit();} else { return false }">
        <i class="bx bx-trash me-1"></i>
    </a>
</form>
