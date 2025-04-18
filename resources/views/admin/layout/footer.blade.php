<?php
$system = App\Models\Setting::first();
?>
<footer
        class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
    <p class="text-muted mb-1 mb-md-0">Copyright © <?php echo date('Y') ?> <a href="{{ URL::to('/') }}"
                                                                              target="_blank"><b>{{ $system->name }}</b></a>
    </p>
    <p class="text-muted"><b>{{ $system->name }}</b> <i class="mb-1 text-primary ms-1 icon-sm" data-feather="heart"></i>
    </p>
</footer>

</div>
</div>

<script src="{{ URL::asset('admin/assets/vendors/core/core.js') }}"></script>
<script src="{{ URL::asset('admin/assets/vendors/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ URL::asset('admin/assets/vendors/feather-icons/feather.min.js') }}"></script>
<script src="{{ URL::asset('admin/assets/js/template.js') }}"></script>
<script src="{{ URL::asset('admin/assets/js/flatpickr.js') }}"></script>
<script src="{{ URL::asset('admin/assets/js/pickr.js') }}"></script>
<script src="https://cdn.tiny.cloud/1/imzoehkh8cvp4e3gi9mtipzudy44lw3hprt53vujzal7rsfi/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script>

    $(document).ready(function() {
        $('.select2').select2();
        $(".flatpickr-date").flatpickr({
            dateFormat: "Y-m-d",
            maxDate: new Date(),
        });
    })

    function ShowLoader() {
        $('#MyLoader').show();
    }

    function HideLoader() {
        $('#MyLoader').hide();
    }

    $('.MyForm').submit(function () {
        $(".MyButton").attr("disabled", true);
        $(".MyButton").html('<div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div>');
    });
</script>

</body>
</html>
