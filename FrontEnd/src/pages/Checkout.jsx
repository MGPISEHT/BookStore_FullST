// import { useState, useEffect } from "react";

// const Checkout = () => {
//   const [cartItems, setCartItems] = useState([]);

//   useEffect(() => {
//     const storedCart = JSON.parse(localStorage.getItem("cart")) || [];
//     setCartItems(storedCart);
//   }, []);

//   const calculateTotal = () => {
//     return cartItems.reduce(
//       (total, item) => total + item.price * item.quantity,
//       0
//     );
//   };
//   return (
//     <div>
//       <div className="site-wrap">
//         <div className="bg-light py-3">
//           <div className="container">
//             <div className="row">
//               <div className="col-md-12 mb-0">
//                 <a href="/">Home</a> <span className="mx-2 mb-0">/</span>{" "}
//                 <a href="/cart">Cart</a> <span className="mx-2 mb-0">/</span>{" "}
//                 <strong className="text-black">Checkout</strong>
//               </div>
//             </div>
//           </div>
//         </div>

//         <div className="site-section">
//           <div className="container">
//             <div className="row mb-5">
//               <div className="col-md-12">
//                 <div className="border p-4 rounded" role="alert">
//                   Returning customer? <a href="#">Click here</a> to login
//                 </div>
//               </div>
//             </div>
//             <div className="row">
//               <div className="col-md-6 mb-5 mb-md-0">
//                 <h2 className="h3 mb-3 text-black">Billing Details</h2>
//                 <div className="p-3 p-lg-5 border">
//                   <div className="form-group">
//                     <label htmlFor="c_country" className="text-black">
//                       Country <span className="text-danger">*</span>
//                     </label>
//                     <select id="c_country" className="form-control">
//                       <option value="1">Select a country</option>
//                       <option value="2">bangladesh</option>
//                       <option value="3">Algeria</option>
//                       <option value="4">Afghanistan</option>
//                       <option value="5">Ghana</option>
//                       <option value="6">Albania</option>
//                       <option value="7">Bahrain</option>
//                       <option value="8">Colombia</option>
//                       <option value="9">Dominican Republic</option>
//                     </select>
//                   </div>
//                   <div className="form-group row">
//                     <div className="col-md-6">
//                       <label htmlFor="c_fname" className="text-black">
//                         First Name <span className="text-danger">*</span>
//                       </label>
//                       <input
//                         type="text"
//                         className="form-control"
//                         id="c_fname"
//                         name="c_fname"
//                       />
//                     </div>
//                     <div className="col-md-6">
//                       <label htmlFor="c_lname" className="text-black">
//                         Last Name <span className="text-danger">*</span>
//                       </label>
//                       <input
//                         type="text"
//                         className="form-control"
//                         id="c_lname"
//                         name="c_lname"
//                       />
//                     </div>
//                   </div>

//                   <div className="form-group row">
//                     <div className="col-md-12">
//                       <label htmlFor="c_companyname" className="text-black">
//                         Company Name{" "}
//                       </label>
//                       <input
//                         type="text"
//                         className="form-control"
//                         id="c_companyname"
//                         name="c_companyname"
//                       />
//                     </div>
//                   </div>

//                   <div className="form-group row">
//                     <div className="col-md-12">
//                       <label htmlFor="c_address" className="text-black">
//                         Address <span className="text-danger">*</span>
//                       </label>
//                       <input
//                         type="text"
//                         className="form-control"
//                         id="c_address"
//                         name="c_address"
//                         placeholder="Street address"
//                       />
//                     </div>
//                   </div>

//                   <div className="form-group">
//                     <input
//                       type="text"
//                       className="form-control"
//                       placeholder="Apartment, suite, unit etc. (optional)"
//                     />
//                   </div>

//                   <div className="form-group row">
//                     <div className="col-md-6">
//                       <label htmlFor="c_state_country" className="text-black">
//                         State / Country <span className="text-danger">*</span>
//                       </label>
//                       <input
//                         type="text"
//                         className="form-control"
//                         id="c_state_country"
//                         name="c_state_country"
//                       />
//                     </div>
//                     <div className="col-md-6">
//                       <label htmlFor="c_postal_zip" className="text-black">
//                         Posta / Zip <span className="text-danger">*</span>
//                       </label>
//                       <input
//                         type="text"
//                         className="form-control"
//                         id="c_postal_zip"
//                         name="c_postal_zip"
//                       />
//                     </div>
//                   </div>

//                   <div className="form-group row mb-5">
//                     <div className="col-md-6">
//                       <label htmlFor="c_email_address" className="text-black">
//                         Email Address <span className="text-danger">*</span>
//                       </label>
//                       <input
//                         type="text"
//                         className="form-control"
//                         id="c_email_address"
//                         name="c_email_address"
//                       />
//                     </div>
//                     <div className="col-md-6">
//                       <label htmlFor="c_phone" className="text-black">
//                         Phone <span className="text-danger">*</span>
//                       </label>
//                       <input
//                         type="text"
//                         className="form-control"
//                         id="c_phone"
//                         name="c_phone"
//                         placeholder="Phone Number"
//                       />
//                     </div>
//                   </div>

//                   <div className="form-group">
//                     <label
//                       htmlFor="c_create_account"
//                       className="text-black"
//                       data-toggle="collapse"
//                       href="#create_an_account"
//                       role="button"
//                       aria-expanded="false"
//                       aria-controls="create_an_account"
//                     >
//                       <input type="checkbox" value="1" id="c_create_account" />{" "}
//                       Create an account?
//                     </label>
//                     <div className="collapse" id="create_an_account">
//                       <div className="py-2">
//                         <p className="mb-3">
//                           Create an account by entering the information below.
//                           If you are a returning customer please login at the
//                           top of the page.
//                         </p>
//                         <div className="form-group">
//                           <label
//                             htmlFor="c_account_password"
//                             className="text-black"
//                           >
//                             Account Password
//                           </label>
//                           <input
//                             type="email"
//                             className="form-control"
//                             id="c_account_password"
//                             name="c_account_password"
//                             placeholder=""
//                           />
//                         </div>
//                       </div>
//                     </div>
//                   </div>

//                   <label
//                     htmlFor="c_ship_different_address"
//                     className="text-black"
//                     data-toggle="collapse"
//                     href="#ship_different_address"
//                     role="button"
//                     aria-expanded="false"
//                     aria-controls="ship_different_address"
//                   >
//                     <input
//                       type="checkbox"
//                       value="1"
//                       id="c_ship_different_address"
//                     />
//                     Ship To A Different Address?
//                   </label>

//                   <div className="form-group">
//                     <div className="collapse" id="ship_different_address">
//                       <div className="py-2">
//                         <div className="form-group">
//                           <label
//                             htmlFor="c_diff_country"
//                             className="text-black"
//                           >
//                             Country <span className="text-danger">*</span>
//                           </label>
//                           <select id="c_diff_country" className="form-control">
//                             <option value="1">Select a country</option>
//                             <option value="2">bangladesh</option>
//                             <option value="3">Algeria</option>
//                             <option value="4">Afghanistan</option>
//                             <option value="5">Ghana</option>
//                             <option value="6">Albania</option>
//                             <option value="7">Bahrain</option>
//                             <option value="8">Colombia</option>
//                             <option value="9">Dominican Republic</option>
//                           </select>
//                         </div>

//                         <div className="form-group row">
//                           <div className="col-md-6">
//                             <label
//                               htmlFor="c_diff_fname"
//                               className="text-black"
//                             >
//                               First Name <span className="text-danger">*</span>
//                             </label>
//                             <input
//                               type="text"
//                               className="form-control"
//                               id="c_diff_fname"
//                               name="c_diff_fname"
//                             />
//                           </div>
//                           <div className="col-md-6">
//                             <label
//                               htmlFor="c_diff_lname"
//                               className="text-black"
//                             >
//                               Last Name <span className="text-danger">*</span>
//                             </label>
//                             <input
//                               type="text"
//                               className="form-control"
//                               id="c_diff_lname"
//                               name="c_diff_lname"
//                             />
//                           </div>
//                         </div>

//                         <div className="form-group row">
//                           <div className="col-md-12">
//                             <label
//                               htmlFor="c_diff_companyname"
//                               className="text-black"
//                             >
//                               Company Name{" "}
//                             </label>
//                             <input
//                               type="text"
//                               className="form-control"
//                               id="c_diff_companyname"
//                               name="c_diff_companyname"
//                             />
//                           </div>
//                         </div>

//                         <div className="form-group row">
//                           <div className="col-md-12">
//                             <label
//                               htmlFor="c_diff_address"
//                               className="text-black"
//                             >
//                               Address <span className="text-danger">*</span>
//                             </label>
//                             <input
//                               type="text"
//                               className="form-control"
//                               id="c_diff_address"
//                               name="c_diff_address"
//                               placeholder="Street address"
//                             />
//                           </div>
//                         </div>

//                         <div className="form-group">
//                           <input
//                             type="text"
//                             className="form-control"
//                             placeholder="Apartment, suite, unit etc. (optional)"
//                           />
//                         </div>

//                         <div className="form-group row">
//                           <div className="col-md-6">
//                             <label
//                               htmlFor="c_diff_state_country"
//                               className="text-black"
//                             >
//                               State / Country{" "}
//                               <span className="text-danger">*</span>
//                             </label>
//                             <input
//                               type="text"
//                               className="form-control"
//                               id="c_diff_state_country"
//                               name="c_diff_state_country"
//                             />
//                           </div>
//                           <div className="col-md-6">
//                             <label
//                               htmlFor="c_diff_postal_zip"
//                               className="text-black"
//                             >
//                               Posta / Zip <span className="text-danger">*</span>
//                             </label>
//                             <input
//                               type="text"
//                               className="form-control"
//                               id="c_diff_postal_zip"
//                               name="c_diff_postal_zip"
//                             />
//                           </div>
//                         </div>

//                         <div className="form-group row mb-5">
//                           <div className="col-md-6">
//                             <label
//                               htmlFor="c_diff_email_address"
//                               className="text-black"
//                             >
//                               Email Address{" "}
//                               <span className="text-danger">*</span>
//                             </label>
//                             <input
//                               type="text"
//                               className="form-control"
//                               id="c_diff_email_address"
//                               name="c_diff_email_address"
//                             />
//                           </div>
//                           <div className="col-md-6 ">
//                             <label
//                               htmlFor="c_diff_phone"
//                               className="text-black "
//                             >
//                               Phone <span className="text-danger ">*</span>
//                             </label>
//                             <input
//                               type="text"
//                               className="form-control"
//                               id="c_diff_phone"
//                               name="c_diff_phone"
//                               placeholder="Phone Number"
//                             />
//                           </div>
//                         </div>
//                       </div>
//                     </div>
//                   </div>

//                   <div className="form-group mt-2">
//                     <label htmlFor="c_order_notes" className="text-black">
//                       Order Notes
//                     </label>
//                     <textarea
//                       name="c_order_notes"
//                       id="c_order_notes"
//                       cols="30"
//                       rows="5"
//                       className="form-control"
//                       placeholder="Write your notes here..."
//                     ></textarea>
//                   </div>
//                 </div>
//               </div>
//               <div className="col-md-6">
//                 <div className="row mb-5">
//                   <div className="col-md-12">
//                     <h2 className="h3 mb-3 text-black">Coupon Code</h2>
//                     <div className="p-3 p-lg-5 border">
//                       <label htmlFor="c_code" className="text-black mb-3">
//                         Enter your coupon code if you have one
//                       </label>
//                       <div className="input-group w-75">
//                         <input
//                           type="text"
//                           className="form-control"
//                           id="c_code"
//                           placeholder="Coupon Code"
//                           aria-label="Coupon Code"
//                           aria-describedby="button-addon2"
//                         />
//                         <div className="input-group-append">
//                           <button
//                             className="btn btn-primary btn-sm"
//                             type="button"
//                             id="button-addon2"
//                           >
//                             Apply
//                           </button>
//                         </div>
//                       </div>
//                     </div>
//                   </div>
//                 </div>

//                 <div className="row mb-5">
//                   <div className="col-md-12">
//                     <h2 className="h3 mb-3 text-black">Your Order</h2>
//                     <div className="p-3 p-lg-5 border">
//                       <table className="table site-block-order-table mb-5">
//                         <thead>
//                           <tr>
//                             <th>Product</th>
//                             <th>Total</th>
//                           </tr>
//                         </thead>
//                         <tbody>
//                           {cartItems.map((item) => (
//                             <tr key={item.id}>
//                               <td>
//                                 {item.title}
//                                 <strong className="mx-2">x</strong>{" "}
//                                 {item.quantity}
//                               </td>
//                               <td>
//                                 ${(item.price * item.quantity).toFixed(2)}
//                               </td>
//                             </tr>
//                           ))}

//                           <tr>
//                             <td className="text-black font-weight-bold">
//                               <strong>Cart Subtotal</strong>
//                             </td>
//                             <td className="text-black">
//                               ${calculateTotal().toFixed(2)}
//                             </td>
//                           </tr>
//                           <tr>
//                             <td className="text-black font-weight-bold">
//                               <strong>Order Total</strong>
//                             </td>
//                             <td className="text-black font-weight-bold">
//                               <strong>${calculateTotal().toFixed(2)}</strong>
//                             </td>
//                           </tr>
//                         </tbody>
//                       </table>

//                       <div className="border p-3 mb-3">
//                         <h3 className="h6 mb-0">
//                           <a
//                             className="d-block text-decoration-none"
//                             data-toggle="collapse"
//                             href="#collapsebank"
//                             role="button"
//                             aria-expanded="false"
//                             aria-controls="collapsebank"
//                           >
//                             Direct Bank Transfer
//                           </a>
//                         </h3>

//                         <div className="collapse" id="collapsebank">
//                           <div className="py-2">
//                             <p className="mb-0">
//                               Make your payment directly into our bank account.
//                               Please use your Order ID as the payment reference.
//                               Your order won’t be shipped until the funds have
//                               cleared in our account.
//                             </p>
//                           </div>
//                         </div>
//                       </div>

//                       <div className="border p-3 mb-3">
//                         <h3 className="h6 mb-0">
//                           <a
//                             className="d-block text-decoration-none"
//                             data-toggle="collapse"
//                             href="#collapsecheque"
//                             role="button"
//                             aria-expanded="false"
//                             aria-controls="collapsecheque"
//                           >
//                             Cheque Payment
//                           </a>
//                         </h3>

//                         <div className="collapse" id="collapsecheque">
//                           <div className="py-2">
//                             <p className="mb-0">
//                               Make your payment directly into our bank account.
//                               Please use your Order ID as the payment reference.
//                               Your order won’t be shipped until the funds have
//                               cleared in our account.
//                             </p>
//                           </div>
//                         </div>
//                       </div>

//                       <div className="border p-3 mb-5">
//                         <h3 className="h6 mb-0">
//                           <a
//                             className="d-block text-decoration-none"
//                             data-toggle="collapse"
//                             href="#collapsepaypal"
//                             role="button"
//                             aria-expanded="false"
//                             aria-controls="collapsepaypal"
//                           >
//                             Paypal
//                           </a>
//                         </h3>

//                         <div className="collapse" id="collapsepaypal">
//                           <div className="py-2">
//                             <p className="mb-0">
//                               Make your payment directly into our bank account.
//                               Please use your Order ID as the payment reference.
//                               Your order won’t be shipped until the funds have
//                               cleared in our account.
//                             </p>
//                           </div>
//                         </div>
//                       </div>

//                       <div className="form-group">
//                         <button
//                           className="btn btn-primary btn-lg py-3 btn-block"
//                           onClick={() => (window.location.href = "/thankyou")}
//                         >
//                           Place Order
//                         </button>
//                       </div>
//                     </div>
//                   </div>
//                 </div>
//               </div>
//             </div>
//           </div>
//         </div>
//       </div>
//     </div>
//   );
// };
import { useState, useEffect } from "react";
import { useNavigate } from "react-router-dom";

const Checkout = () => {
  const [cartItems, setCartItems] = useState([]);
  const [total, setTotal] = useState(0);
  const navigate = useNavigate();

  useEffect(() => {
    // Load cart data from localStorage
    const storedCart = JSON.parse(localStorage.getItem("cart")) || [];
    setCartItems(storedCart);
    const calculatedTotal = storedCart.reduce(
      (sum, item) => sum + item.price * item.quantity,
      0
    );
    setTotal(calculatedTotal);

    // Load PayPal SDK script only if not already loaded
    if (!document.querySelector("#paypal-sdk")) {
      const script = document.createElement("script");
      script.src = `https://www.paypal.com/sdk/js?client-id=AfkfEA59DV9179OsB5kuRYFTzdu4Ap7KZTKe9peAbqHH7Q0L5JFJeQcDFKP9qEpvObffMNaTVILlUfqC&currency=USD`;
      script.id = "paypal-sdk";
      script.async = true;
      script.onload = initializePayPalButton;
      document.body.appendChild(script);
    } else {
      initializePayPalButton();
    }
  }, []);

  const initializePayPalButton = () => {
    if (window.paypal) {
      window.paypal
        .Buttons({
          createOrder: async (data, actions) => {
            try {
              return await actions.order.create({
                purchase_units: [
                  {
                    amount: { value: total.toFixed(2) },
                  },
                ],
              });
            } catch (err) {
              console.error("Error creating order:", err);
              throw err;
            }
          },
          onApprove: async (data, actions) => {
            try {
              const details = await actions.order.capture();
              alert(
                `Transaction completed by ${details.payer.name.given_name}`
              );
              // Clear cart and redirect
            } catch (err) {
              console.error("Error capturing payment:", err);
              alert("Payment capture failed.");
              throw err;
            }
          },
          onError: (err) => {
            console.error("PayPal Checkout Error:", err);
            alert("Something went wrong with the payment.");
          },
        })
        .render("#paypal-button-container"); // Render PayPal button
    }
  };

  return (
    <div className="container">
      <h2>Checkout</h2>
      <table className="table">
        <thead>
          <tr>
            <th>Product</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          {cartItems.map((item) => (
            <tr key={item.id}>
              <td>
                {item.title} <strong>x {item.quantity}</strong>
              </td>
              <td>${(item.price * item.quantity).toFixed(2)}</td>
            </tr>
          ))}
          <tr>
            <td>
              <strong>Cart Subtotal</strong>
            </td>
            <td>${total.toFixed(2)}</td>
          </tr>
        </tbody>
      </table>
      <h3>PayPal Payment</h3>
      <div id="paypal-button-container"></div>
    </div>
  );
};

export default Checkout;
