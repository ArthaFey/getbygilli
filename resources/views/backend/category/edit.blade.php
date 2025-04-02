@extends('backend.template-admin.index')
@section('content')




<script>
    const category = document.querySelector('#category');
    const slug = document.querySelector('#slug');

    category.addEventListener('change', function() {
        fetch('/category/checkSlug?category=' + category.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug);
});

</script>
@endsection