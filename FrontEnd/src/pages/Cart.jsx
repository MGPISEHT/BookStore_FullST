import { useState, useEffect } from 'react';
import { Link } from 'react-router-dom'; // Import Link for navigation

const Cart = ({ cartItems, setCartItems }) => {
  const [total, setTotal] = useState(0);

  // Load cart items from localStorage on initial mount
  useEffect(() => {
    const storedCart = JSON.parse(localStorage.getItem('cart')) || [];
    setCartItems(storedCart);
  }, [setCartItems]); // Dependency array includes setCartItems to avoid lint warnings

  // Update localStorage and total whenever cartItems change
  useEffect(() => {
    localStorage.setItem('cart', JSON.stringify(cartItems));
    const newTotal = cartItems.reduce(
      (sum, item) => sum + item.price * item.quantity,
      0
    );
    setTotal(newTotal);
  }, [cartItems]);

  // Load PayPal SDK script
  useEffect(() => {
    // Only load the script if it hasn't been loaded already
    if (!document.getElementById('paypal-sdk')) {
      const script = document.createElement('script');
      script.id = 'paypal-sdk'; // Add an ID to prevent multiple loads
      script.src = `https://www.paypal.com/sdk/js?client-id=AfkfEA59DV9179OsB5kuRYFTzdu4Ap7KZTKe9peAbqHH7Q0L5JFJeQcDFKP9qEpvObffMNaTVILlUfqC&currency=USD`; // Add currency
      script.async = true;
      script.onload = () => initializePayPalButton();
      script.onerror = (err) => console.error('PayPal SDK Load Error:', err);
      document.body.appendChild(script);
    } else {
      // If already loaded, re-initialize buttons in case total changed
      initializePayPalButton();
    }

    // Cleanup function to remove script if component unmounts (optional but good practice)
    return () => {
      const script = document.getElementById('paypal-sdk');
      if (script) {
        script.remove();
      }
    };
  }, [total]); // Re-run when total changes to update payment amount

  const initializePayPalButton = () => {
    // Clear existing buttons to prevent re-rendering issues
    const paypalContainer = document.getElementById('paypal-button-container');
    if (paypalContainer) {
      paypalContainer.innerHTML = '';
    }

    if (window.paypal && total > 0) { // Only render if total is greater than 0
      window.paypal
        .Buttons({
          createOrder: (data, actions) => {
            return actions.order.create({
              purchase_units: [
                {
                  amount: {
                    value: total.toFixed(2), // Ensure value is a string with 2 decimal places
                  },
                },
              ],
            });
          },
          onApprove: (data, actions) => {
            return actions.order.capture().then((details) => {
              alert(
                `Transaction completed by ${details.payer.name.given_name}. Order ID: ${details.id}`
              );
              setCartItems([]); // Clear cart after successful payment
              localStorage.removeItem('cart');
              // Redirect to a thank you page
              window.location.href = '/thankyou';
            });
          },
          onError: (err) => {
            console.error('PayPal Button Error:', err);
            alert('Something went wrong with the payment. Please try again.');
          },
          onCancel: (data) => {
            console.log('Payment cancelled:', data);
            alert('Payment cancelled.');
          }
        })
        .render('#paypal-button-container');
    }
  };

  const removeItem = (id) => {
    setCartItems((prevItems) => prevItems.filter((item) => item.id !== id));
  };

  const updateQuantity = (id, delta) => {
    setCartItems((prevItems) =>
      prevItems.map((item) =>
        item.id === id
          ? { ...item, quantity: Math.max(item.quantity + delta, 1) } // Ensure quantity doesn't go below 1
          : item
      )
    );
  };

  const applyCoupon = () => {
    alert('Coupon applied (functionality not yet implemented).');
  };

  return (
    <div className="site-wrap">
      <div className="bg-light py-3">
        <div className="container">
          <div className="row">
            <div className="col-md-12 mb-0">
              <Link to="/" className="text-decoration-none">
                Home
              </Link>
              <span className="mx-2">/</span>
              <strong className="text-black">Cart</strong>
            </div>
          </div>
        </div>
      </div>

      <div className="site-section">
        <div className="container">
          <div className="row mb-5">
            <form className="col-md-12">
              <div className="site-blocks-table">
                <table className="table table-bordered">
                  <thead>
                    <tr>
                      <th className="product-thumbnail">Image</th>
                      <th className="product-name">Product</th>
                      <th className="product-price">Price</th>
                      <th className="product-quantity">Quantity</th>
                      <th className="product-total">Total</th>
                      <th className="product-remove">Remove</th>
                    </tr>
                  </thead>
                  <tbody>
                    {cartItems.length > 0 ? (
                      cartItems.map((item) => (
                        <tr key={item.id} style={{ height: '100px' }}>
                          <td className="product-thumbnail">
                            {/* Assuming 'image' property is available on cart items */}
                            <img
                              src={`http://127.0.0.1:8000/storage/${item.image || item.cover_image}`} // Use item.image or fallback to item.cover_image
                              alt={item.title}
                              className="img-fluid"
                              style={{ width: '50px', height: 'auto' }}
                            />
                          </td>
                          <td className="product-name">
                            <h2 className="h6 text-black">{item.title}</h2>
                          </td>
                          <td>${item.price ? parseFloat(item.price).toFixed(2) : '0.00'}</td>
                          <td>
                            <div
                              className="input-group mb-3"
                              style={{ maxWidth: '150px', marginTop: '16px' }}
                            >
                              <div className="input-group-prepend">
                                <button
                                  style={{ width: '34px', height: '40px' }}
                                  className="btn btn-outline-primary me-2"
                                  type="button"
                                  onClick={() => updateQuantity(item.id, -1)}
                                >
                                  -
                                </button>
                              </div>
                              <input
                                type="text"
                                className="form-control text-center me-2"
                                value={item.quantity}
                                readOnly
                              />
                              <div className="input-group-append">
                                <button
                                  style={{ width: '34px', height: '40px' }}
                                  className="btn btn-outline-primary"
                                  type="button"
                                  onClick={() => updateQuantity(item.id, 1)}
                                >
                                  +
                                </button>
                              </div>
                            </div>
                          </td>
                          <td>${(item.price * item.quantity).toFixed(2)}</td>
                          <td>
                            <button
                              className="btn btn-primary"
                              type="button"
                              onClick={() => removeItem(item.id)}
                            >
                              X
                            </button>
                          </td>
                        </tr>
                      ))
                    ) : (
                      <tr>
                        <td colSpan="6" className="text-center py-5">Your cart is empty.</td>
                      </tr>
                    )}
                  </tbody>
                </table>
              </div>
            </form>
          </div>

          <div className="row">
            <div className="col-md-6">
              <div className="row mb-5">
                <div className="col-md-6 mb-3 mb-md-0">
                  <button
                    className="btn btn-primary btn-sm btn-block"
                    type="button"
                    // No explicit action for update cart, as quantity changes are live
                  >
                    Update Cart
                  </button>
                </div>
                <div className="col-md-6">
                  <Link to="/shop" className="btn btn-outline-primary btn-sm btn-block">
                    Continue Shopping
                  </Link>
                </div>
              </div>

              <div className="row">
                <div className="col-md-12">
                  <label className="text-black h4" htmlFor="coupon">
                    Coupon
                  </label>
                  <p>Enter your coupon code if you have one.</p>
                </div>
                <div className="col-md-8 mb-3 mb-md-0">
                  <input
                    type="text"
                    className="form-control py-3"
                    id="coupon"
                    placeholder="Coupon Code"
                  />
                </div>
                <div className="col-md-4">
                  <button
                    className="btn btn-primary btn-sm"
                    type="button"
                    onClick={applyCoupon}
                  >
                    Apply Coupon
                  </button>
                </div>
              </div>
            </div>

            <div className="col-md-6 pl-5">
              <div className="row justify-content-end">
                <div className="col-md-7">
                  <div className="row">
                    <div className="col-md-12 text-right border-bottom mb-5">
                      <h3 className="text-black h4 text-uppercase">
                        Cart Totals
                      </h3>
                    </div>
                  </div>

                  <div className="row mb-3">
                    <div className="col-md-6">
                      <span className="text-black">Subtotal</span>
                    </div>
                    <div className="col-md-6 text-right">
                      <strong className="text-black">
                        ${total.toFixed(2)}
                      </strong>
                    </div>
                  </div>

                  <div className="row mb-5">
                    <div className="col-md-6">
                      <span className="text-black">Total</span>
                    </div>
                    <div className="col-md-6 text-right">
                      <strong className="text-black">
                        ${total.toFixed(2)}
                      </strong>
                    </div>
                  </div>

                  <div className="row">
                    <div className="col-md-12">
                      <div id="paypal-button-container"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Cart;