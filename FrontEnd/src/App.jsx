import { BrowserRouter, Routes, Route } from "react-router-dom";
import Home from "./pages/Home";
import About from "./pages/Abuot";
import Cart from "./pages/Cart";
import Checkout from "./pages/Checkout";
import Contact from "./pages/Contact";
import Shop from "./pages/Shop";
import ShopSingle from "./pages/ShopSingle";
import ThankYou from "./pages/ThankYou";
import Header from "./components/Header";
import Footer from "./components/Footer";
import { useState, useEffect } from "react";

export const App = () => {
  // // Function to handle adding an item to the cart
  // const handleAddToCart = (product) => {
  //   setCartItems((prevItems) => {
  //     const existingItem = prevItems.find((item) => item.id === product.id);
  //     if (existingItem) {
  //       // If the product already exists in the cart, increase its quantity
  //       return prevItems.map((item) =>
  //         item.id === product.id
  //           ? { ...item, quantity: item.quantity + 1 }
  //           : item
  //       );
  //     }
  //     // If the product is new, add it to the cart
  //     return [...prevItems, { ...product, quantity: 1 }];
  //   });
  // };
  const [cartItems, setCartItems] = useState(
    JSON.parse(localStorage.getItem("cart")) || []
  );

  const handleAddToCart = (product) => {
    setCartItems((prevItems) => {
      const existingItem = prevItems.find((item) => item.id === product.id);

      if (existingItem) {
        return prevItems.map((item) =>
          item.id === product.id
            ? { ...item, quantity: item.quantity + 1 }
            : item
        );
      }

      return [...prevItems, { ...product, quantity: 1 }];
    });

    alert(`${product.title} has been added to the cart!`);
  };
  return (
    <BrowserRouter>
      <Header
        cartCount={cartItems.reduce((sum, item) => sum + item.quantity, 0)}
      />
      <Routes>
        <Route path="/" element={<Home />} />
        <Route path="/about" element={<About />} />
        <Route
          path="/cart"
          element={<Cart handleAddToCart={handleAddToCart} cartItems={cartItems} setCartItems={setCartItems} />}
        />
        <Route path="/checkout"  element={<Checkout />} />
        <Route path="/contact" element={<Contact />} />
        <Route
          path="/shop"
          element={<Shop handleAddToCart={handleAddToCart} />}
        />
        <Route
          path="/shop-single/:id"
          element={<ShopSingle handleAddToCart={handleAddToCart} />}
        />
        <Route path="/thankyou" element={<ThankYou />} />
      </Routes>
      <Footer />
    </BrowserRouter>
  );
};
