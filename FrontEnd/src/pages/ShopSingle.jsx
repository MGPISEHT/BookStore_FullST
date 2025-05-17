import React, { useEffect, useState } from "react";
import { useParams, Link, useNavigate } from "react-router-dom";

const ShopSingle = ({ handleAddToCart }) => {
  const { id } = useParams(); // Get the product ID from the URL
  const navigate = useNavigate(); // For navigating after adding to cart
  const [product, setProduct] = useState(null);
  const [loading, setLoading] = useState(true);
  const [quantity, setQuantity] = useState(1); // Manage quantity input

  useEffect(() => {
    fetch(`https://fakestoreapi.com/products/${id}`)
      .then((response) => response.json())
      .then((data) => {
        setProduct(data);
        setLoading(false);
      })
      .catch((error) => {
        console.error("Error fetching product:", error);
        setLoading(false);
      });
  }, [id]);

  const handleQuantityChange = (e) => {
    const value = parseInt(e.target.value, 10);
    if (value >= 1) {
      setQuantity(value);
    }
  };

  const handleAdd = () => {
    // When adding to cart, include the quantity
    const productWithQuantity = { ...product, quantity };
    handleAddToCart(productWithQuantity);
    navigate("/cart"); // Redirect to cart
  };

  if (loading) {
    return <p className="text-center">Loading product details...</p>;
  }

  if (!product) {
    return <p className="text-center">Product not found</p>;
  }

  return (
    <div className="site-wrap">
      <div className="bg-light py-3">
        <div className="container">
          <div className="row">
            <div className="col-md-12 mb-0">
              <Link to="/">Home</Link> <span className="mx-2 mb-0">/</span>
              <strong className="text-black">{product.title}</strong>
            </div>
          </div>
        </div>
      </div>

      <div className="site-section">
        <div className="container">
          <div className="row">
            <div className="col-md-6">
              <img
                src={product.image}
                alt={product.title}
                className="img-fluid"
                style={{ width: "300px", marginLeft: "30%" }}
              />
            </div>
            <div className="col-md-6">
              <h2 className="text-black">{product.title}</h2>
              <p>{product.description}</p>
              <p>
                <strong className="text-primary h4">${product.price}</strong>
              </p>

              <div className="d-flex mb-3" style={{ maxWidth: "150px" }}>
                <input
                  type="number"
                  min="1"
                  value={quantity}
                  onChange={handleQuantityChange}
                  className="form-control text-center"
                />
              </div>

              <p>
                <button
                  onClick={handleAdd}
                  className="buy-now btn btn-sm btn-primary"
                >
                  Add To Cart
                </button>
              </p>

            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default ShopSingle;
