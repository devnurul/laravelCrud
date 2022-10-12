@extends('layout.default')


@section('title', 'About Us')

@section('page_view')
    <h3>This is about us</h3>
@endsection



@push('javascript')
    <script>
    $(document).ready(function() {
        alert("this about");
    })
</script>
@endpush
