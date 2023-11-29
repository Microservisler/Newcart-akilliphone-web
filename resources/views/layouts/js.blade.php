<script>
    @if($flash = session()->get('flash-error'))
    Swal.fire({
        title: '{{ $flash[0] }} {{ $flash[1] }}',
        toast: true,
        position: 'top-end',
        timer: 3000,
        icon: 'error',
        showConfirmButton: false,
    });
    @endif
    @if($flash = session()->get('flash-success'))
    Swal.fire({
        title: '{{ $flash[0] }} {{ $flash[1] }}',
        toast: true,
        position: 'top-end',
        timer: 3000,
        icon: 'success',
        showConfirmButton: false,
    });
    @endif
</script>
