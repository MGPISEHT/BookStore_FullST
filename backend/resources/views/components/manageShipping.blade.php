<x-layout>
    @include('pages.sidebar')
    @include('components.Shippings.addShipping')
    @include('components.Shippings.editShipping')
    @include('components.Shippings.deleteShipping')
    <section class="main_content dashboard_part large_header_bg">
        @include('pages.header')

        <div class="table-data">
            <div class="d-flex justify-content-between align-items-center flex-wrap p-3">
                <h1>Shipping Addresses</h1>
                <div class="serach_field-area d-flex align-items-center justify-content-between">
                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#addShippingAddressModal">Add Address</button>
                    <div class="search_inner ml-4">
                        <form action="#">
                            <div class="search_field">
                                <input type="text" placeholder="Search here..." />
                            </div>
                            <button type="submit">
                                <img src="{{ url('img/icon/icon_search.svg') }}" alt />
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="container-fluid p-2">
                <table class="table p-4" id="shippingAddressTable">
                    <thead class="thead-dark">
                        <tr>
                            <th>Recipient</th>
                            <th>Address Line 1</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Country</th>
                            <th>Phone</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($shipping_addresses->isNotEmpty())
                        @foreach ($shipping_addresses as $shipping)
                        <tr>
                            <td>{{ $shipping->recipient_name }}</td>
                            <td>{{ $shipping->address_line1 }}</td>
                            <td>{{ $shipping->city }}</td>
                            <td>{{ $shipping->state }}</td>
                            <td>{{ $shipping->country }}</td>
                            <td>{{ $shipping->phone }}</td>
                            <td>{{ $shipping->created_at }}</td>
                            <td>{{ $shipping->updated_at }}</td>
                            <td>
                                <button class="btn btn-sm btn-primary editShippingAddress" data-id="{{ $shipping->id }}" data-toggle="modal" data-target="#editShippingAddressModal{{ $shipping->id }}">Edit</button>
                                <button class="btn btn-sm btn-danger deleteShippingAddress" data-id="{{ $shipping->id }}" data-toggle="modal" data-target="#deleteShippingAddressModal{{ $shipping->id }}">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="9" class="text-center">No shipping addresses available.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        @include('pages.footer')
    </section>

    <!-- Chat popup and other UI components here -->

</x-layout>

<script>
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $(document).ready(function() {
        // Add Shipping Address
        $(document).on("click", ".createShippingAddress", function(e) {
            e.preventDefault();
            let form = $("#addShippingAddressForm")[0];
            let formData = new FormData(form);

            $.ajax({
                url: "{{ route('shipping.store') }}",
                method: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status === "success") {
                        $("#addShippingAddressModal").modal("hide");
                        form.reset();
                        $("#shippingAddressTable").load(location.href + " #shippingAddressTable");
                    } else {
                        alert("Failed to add address.");
                    }
                },
                error: function() {
                    alert("An error occurred.");
                }
            });
        });

        // Edit Shipping Address
        $(document).on("click", ".editShippingAddress", function(e) {
            e.preventDefault();
            let addressID = $(this).data("id");

            $.ajax({
                url: "/shipping-addresses/edit/" + addressID,
                method: "GET",
                success: function(response) {
                    if (response.status === "success") {
                        $('#editShippingAddressForm #recipient_name').val(response.address.recipient_name);
                        $('#editShippingAddressForm #address_line1').val(response.address.address_line1);
                        $('#editShippingAddressForm #city').val(response.address.city);
                        $('#editShippingAddressForm #state').val(response.address.state);
                        $('#editShippingAddressForm #country').val(response.address.country);
                        $('#editShippingAddressForm #phone').val(response.address.phone);
                        $('#editShippingAddressModal').modal('show');
                    }
                },
                error: function() {
                    alert("Failed to load address data.");
                }
            });
        });

        // Update Shipping Address
        $(document).on("click", ".updateShippingAddress", function(e) {
            e.preventDefault();
            let form = $("#editShippingAddressForm")[0];
            let formData = new FormData(form);
            let addressID = $("#editShippingAddressForm").data("id");

            $.ajax({
                url: "/shipping-addresses/update/" + addressID,
                method: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status === "success") {
                        $('#editShippingAddressModal').modal('hide');
                        form.reset();
                        $("#shippingAddressTable").load(location.href + " #shippingAddressTable");
                    }
                },
                error: function() {
                    alert("Update failed.");
                }
            });
        });

        // Delete Shipping Address
        $(document).on("click", ".deleteShippingAddress", function(e) {
            e.preventDefault();
            let addressID = $(this).data("id");

            if (!confirm("Are you sure you want to delete this address?")) return;

            $.ajax({
                url: "/shipping-addresses/delete/" + addressID,
                method: "DELETE",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.status === "success") {
                        $("#shippingAddressTable").load(location.href + " #shippingAddressTable");
                        $("#deleteShippingAddressModal" + addressID).modal("hide");
                    }
                },
                error: function() {
                    alert("Delete failed.");
                }
            });
        });
    });
</script>