<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.10/dist/sweetalert2.min.css
" rel="stylesheet">
<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.10/dist/sweetalert2.all.min.js
"></script>
<script>
    @if (Session::has('success'))
        Swal.fire({
            icon: 'success',
            title: "Berhasil",
            text: "{{ Session::get('success') }}",
            timer: 3000,
            showConfirmButton: false,
        })
    @endif
    @if (Session::has('error'))
        Swal.fire({
            icon: 'error',
            title: "Gagal",
            text: "{{ Session::get('error') }}",
            timer: 3000,
            showConfirmButton: false,
        })
    @endif
    @if ($errors->any())
        @php
            $message = '';
            foreach ($errors->all() as $error) {
                $message .= "<li> $error </li>";
            }
        @endphp
        Swal.fire({
            title: 'Error',
            html: `{!! $message !!}`,
            icon: 'error',
        })
    @endif

    function formConfirmation(message) {
        var form = event.target.form;
        Swal.fire({
            html: `<h3>${message}</h3>`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        })
    }

    function formConfirmationId(formId, message) {
        var form = $(`${formId}`);
        Swal.fire({
            html: `<h3>${message}</h3>`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        })
    }
</script>
