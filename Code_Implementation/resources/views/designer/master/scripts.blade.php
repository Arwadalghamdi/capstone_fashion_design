
<script src="{{url('admin/assets/vendor/libs/jquery/jquery.js')}}"></script>
<script src="{{url('admin/assets/vendor/libs/popper/popper.js')}}"></script>
<script src="{{url('admin/assets/vendor/js/bootstrap.js')}}"></script>
<script src="{{url('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

<script src="{{url('admin/assets/vendor/js/menu.js')}}"></script>
<script src="{{url('admin/assets/js/main.js')}}"></script>
<script src="{{url('admin/assets/js/ui-modals.js')}}"></script>
<script src="//cdn.datatables.net/2.1.7/js/dataTables.min.js"></script>
@yield('js')
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script>
    $('.btn-del').on('click', function(e){
        e.preventDefault();

        // Get the action URL and customer name from the button's data attributes
        let action = $(this).attr('data-action');
        let customerName = $(this).attr('data-customer-name'); // Get customer name

        // Set the form action URL
        $('#delete-form').attr('action', action);

        // Set the customer name in the modal
        $('#customerName').text(customerName);
    });

    document.addEventListener('DOMContentLoaded', function () {
        let table = new DataTable('.tableData', {
            responsive: true,     // Make it responsive
            paging: true,         // Enable pagination
            searching: true,      // Enable searching
            ordering: true,       // Enable column sorting
            autoWidth: false,     // Disable auto width for better layout control
        });
    });
</script>
