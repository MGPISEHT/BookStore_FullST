@foreach ($shipping_addresses as $shipping)
<!-- Edit Shipping Address Modal -->
<div class="modal fade" id="editShippingAddressModal{{ $shipping->id }}" tabindex="-1" role="dialog" aria-labelledby="editShippingAddressModalLabel{{ $shipping->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('shipping.update', $shipping->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editShippingAddressModalLabel{{ $shipping->id }}">Edit Shipping Address</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="user_id{{ $shipping->id }}">User ID:</label>
                        <input type="number" name="user_id" id="user_id{{ $shipping->id }}" class="form-control" value="{{ $shipping->user_id }}" required>
                    </div>

                    <div class="form-group">
                        <label for="recipient_name{{ $shipping->id }}">Recipient Name:</label>
                        <input type="text" name="recipient_name" id="recipient_name{{ $shipping->id }}" class="form-control" value="{{ $shipping->recipient_name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="address_line1{{ $shipping->id }}">Address Line 1:</label>
                        <input type="text" name="address_line1" id="address_line1{{ $shipping->id }}" class="form-control" value="{{ $shipping->address_line1 }}" required>
                    </div>

                    <div class="form-group">
                        <label for="address_line2{{ $shipping->id }}">Address Line 2:</label>
                        <input type="text" name="address_line2" id="address_line2{{ $shipping->id }}" class="form-control" value="{{ $shipping->address_line2 }}">
                    </div>

                    <div class="form-group">
                        <label for="city{{ $shipping->id }}">City:</label>
                        <input type="text" name="city" id="city{{ $shipping->id }}" class="form-control" value="{{ $shipping->city }}" required>
                    </div>

                    <div class="form-group">
                        <label for="state{{ $shipping->id }}">State:</label>
                        <input type="text" name="state" id="state{{ $shipping->id }}" class="form-control" value="{{ $shipping->state }}" required>
                    </div>

                    <div class="form-group">
                        <label for="postal_code{{ $shipping->id }}">Postal Code:</label>
                        <input type="text" name="postal_code" id="postal_code{{ $shipping->id }}" class="form-control" value="{{ $shipping->postal_code }}" required>
                    </div>

                    <div class="form-group">
                        <label for="country{{ $shipping->id }}">Country:</label>
                        <input type="text" name="country" id="country{{ $shipping->id }}" class="form-control" value="{{ $shipping->country }}" required>
                    </div>

                    <div class="form-group">
                        <label for="phone{{ $shipping->id }}">Phone:</label>
                        <input type="text" name="phone" id="phone{{ $shipping->id }}" class="form-control" value="{{ $shipping->phone }}" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update Shipping Address</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach
