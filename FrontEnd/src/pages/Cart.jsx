import { useState, useEffect } from 'react';

const Cart = ({ cartItems, setCartItems }) => {
  const [total, setTotal] = useState(0);

  useEffect(() => {
    const storedCart = JSON.parse(localStorage.getItem('cart')) || [];
    setCartItems(storedCart);
  }, [setCartItems]);

  useEffect(() => {
    localStorage.setItem('cart', JSON.stringify(cartItems));
    const newTotal = cartItems.reduce(
      (sum, item) => sum + item.price * item.quantity,
      0
    );
    setTotal(newTotal);
  }, [cartItems]);

  useEffect(() => {
    // Load PayPal SDK script
    const script = document.createElement('script');
    script.src = `https://www.paypal.com/sdk/js?client-id=AfkfEA59DV9179OsB5kuRYFTzdu4Ap7KZTKe9peAbqHH7Q0L5JFJeQcDFKP9qEpvObffMNaTVILlUfqC`;
    script.async = true;
    script.onload = () => initializePayPalButton();
    document.body.appendChild(script);
  }, [total]);

  const initializePayPalButton = () => {
    if (window.paypal) {
      window.paypal
        .Buttons({
          createOrder: (data, actions) => {
            return actions.order.create({
              purchase_units: [
                {
                  amount: {
                    value: total.toFixed(2),
                  },
                },
              ],
            });
          },
          onApprove: (data, actions) => {
            return actions.order.capture().then((details) => {
              alert(
                `Transaction completed by ${details.payer.name.given_name}`
              );
              setCartItems([]);
              localStorage.removeItem('cart');
              window.location.href = '/thankyou';
            });
          },
          onError: (err) => {
            console.error(err);
            alert('Something went wrong with the payment.');
          },
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
          ? { ...item, quantity: Math.max(item.quantity + delta, 1) }
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
              <a href="/" className="text-decoration-none">
                Home
              </a>
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
                    {cartItems.map((item) => (
                      <tr key={item.id} style={{ height: '100px' }}>
                        <td className="product-thumbnail">
                          <img
                            src={item.image}
                            alt={item.title}
                            className="img-fluid"
                            style={{ width: '50px' }}
                          />
                        </td>
                        <td className="product-name">
                          <h2 className="h6 text-black">{item.title}</h2>
                        </td>
                        <td>${item.price.toFixed(2)}</td>
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
                    ))}
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
                  >
                    Update Cart
                  </button>
                </div>
                <div className="col-md-6">
                  <button
                    className="btn btn-outline-primary btn-sm btn-block"
                    type="button"
                  >
                    Continue Shopping
                  </button>
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
