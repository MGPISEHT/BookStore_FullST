<!-- Add Shipping Address Modal -->
@foreach ($shipping_addresses as $shipping)

<div class="modal fade" id="addShippingAddressModal" tabindex="-1" role="dialog" aria-labelledby="addShippingAddressModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('shipping.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addShippingAddressModalLabel">Add Shipping Address</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="user_id">User ID:</label>
                        <input type="number" name="user_id" id="user_id" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="recipient_name">Recipient Name:</label>
                        <input type="text" name="recipient_name" id="recipient_name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="address_line1">Address Line 1:</label>
                        <input type="text" name="address_line1" id="address_line1" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="address_line2">Address Line 2:</label>
                        <input type="text" name="address_line2" id="address_line2" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="city">City:</label>
                        <input type="text" name="city" id="city" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="state">State:</label>
                        <input type="text" name="state" id="state" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="postal_code">Postal Code:</label>
                        <input type="text" name="postal_code" id="postal_code" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="country">Country:</label>
                        <input type="text" name="country" id="country" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="text" name="phone" id="phone" class="form-control" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Shipping Address</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach