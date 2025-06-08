import { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';

const Shop = ({ handleAddToCart }) => {
  const [products, setProducts] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  useEffect(() => {
    // Fetch products from your API
    fetch('http://127.0.0.1:8000/api/books/')
      .then((response) => {
        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.json();
      })
      .then((data) => {
        // Assuming your API returns an object with a 'books' array, like { books: [...] }
        if (data && Array.isArray(data.books)) {
          setProducts(data.books);
        } else {
          // If the API structure is different (e.g., returns an array directly),
          // adjust this line: setProducts(data);
          throw new Error("API response did not contain a 'books' array.");
        }
        setLoading(false);
      })
      .catch((error) => {
        console.error('Error fetching products:', error);
        setError(error.message);
        setLoading(false);
      });
  }, []);

  if (loading) {
    return <p className="text-center mt-5">Loading products...</p>;
  }

  if (error) {
    return <p className="text-center mt-5 text-danger">Error: {error}</p>;
  }

  return (
    <div className="site-wrap">
      {/* Breadcrumbs */}
      <div className="bg-light py-3">
        <div className="container">
          <div className="row">
            <div className="col-md-12 mb-0">
              <Link to="/" className="text-decoration-none">Home</Link> <span className="mx-2 mb-0">/</span>
              <strong className="text-black">Shop</strong>
            </div>
          </div>
        </div>
      </div>

      {/* Shop section */}
      <div className="site-section">
        <div className="container">
          <div className="row mb-5">
            <div className="col-md-9 order-2">
              {/* Products */}
              <div className="row mb-5">
                {products.length > 0 ? (
                  products.map((product) => (
                    <div
                      className="col-sm-6 col-lg-4 mb-4"
                      key={product.id}
                      // Removed data-aos as it requires an external library
                    >
                      <div className="block-4 text-center border rounded">
                        {/* Adjusting styles for better image container handling */}
                        <div style={{ height: '360px', display: 'flex', flexDirection: 'column' }}>
                          <figure
                            className="block-4-image"
                            style={{ flexShrink: 0, display: 'flex', justifyContent: 'center', alignItems: 'center', height: '170px' }}
                          >
                            <Link to={`/shop-single/${product.id}`}>
                              <img
                                src={`http://127.0.0.1:8000/storage/${product.cover_image}`}
                                alt={product.title}
                                className="img-fluid"
                                style={{ maxHeight: '100%', maxWidth: '100px', objectFit: 'contain' }} // Ensure image fits
                              />
                            </Link>
                          </figure>
                          <div
                            className="block-4-text p-3"
                            style={{ flexGrow: 1, display: 'flex', flexDirection: 'column', justifyContent: 'space-between' }}
                          >
                            <h3
                              style={{
                                fontSize: '1rem',
                                fontFamily: 'revert',
                                flexGrow: 1, // Allow title to take up available space
                                overflow: 'hidden',
                                textOverflow: 'ellipsis',
                                display: '-webkit-box',
                                WebkitLineClamp: 3, // Limit title to 3 lines
                                WebkitBoxOrient: 'vertical',
                              }}
                            >
                              <Link to={`/shop-single/${product.id}`} className="text-decoration-none text-black">
                                {product.title}
                              </Link>
                            </h3>
                            <p className="text-danger font-weight-bold d-flex justify-content-between align-items-center mt-2">
                              ${product.price ? parseFloat(product.price).toFixed(2) : 'N/A'}
                              <Link
                                onClick={() => handleAddToCart(product)}
                                to="/cart" // Assuming a direct link to cart after adding
                                className="buy-now btn fw-bold btn-info btn-outline"
                                style={{
                                  width: '100px',
                                  height: '30px',
                                  fontSize: '12px',
                                  color: 'white',
                                  display: 'flex',
                                  justifyContent: 'center',
                                  alignItems: 'center'
                                }}
                              >
                                Add Cart
                              </Link>
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  ))
                ) : (
                  <p className="col-12 text-center">No products found.</p>
                )}
              </div>

              {/* Pagination */}
              <div className="row" /* Removed data-aos */>
                <div className="col-md-12 text-center">
                  <div className="site-block-27">
                    <ul className="justify-content-center">
                      <li className="page-item">
                        <a className="page-link rounded-circle me-2" href="#!">
                          &lt;
                        </a>
                      </li>
                      <li className="page-item active me-1">
                        <span className="page-link">1</span>
                      </li>
                      <li className="page-item me-1">
                        <a className="page-link" href="#!">
                          2
                        </a>
                      </li>
                      <li className="page-item me-1">
                        <a className="page-link" href="#!">
                          3
                        </a>
                      </li>
                      <li className="page-item me-1">
                        <a className="page-link" href="#!">
                          4
                        </a>
                      </li>
                      <li className="page-item me-1">
                        <a className="page-link" href="#!">
                          5
                        </a>
                      </li>
                      <li className="page-item me-1">
                        <a className="page-link rounded-circle ms-2" href="#!">
                          &gt;
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            {/* Sidebar */}
            <div className="col-md-3 order-1 mb-5 mb-md-0">
              <div className="border p-4 rounded mb-4">
                <h3 className="mb-3 h6 text-uppercase text-black d-block">
                  Categories
                </h3>
                <ul className="list-unstyled mb-0">
                  <li className="mb-1">
                    <a
                      href="#!" // Use #! for inert links
                      className="text-decoration-none d-flex justify-content-between"
                    >
                      <span>Science </span>
                      <span className="text-black">(1)</span>
                    </a>
                  </li>
                  <li className="mb-1">
                    <a
                      href="#!" // Use #! for inert links
                      className="text-decoration-none d-flex justify-content-between"
                    >
                      <span>Laravel </span>
                      <span className="text-black">(4)</span>
                    </a>
                  </li>
                  <li className="mb-1">
                    <a
                      href="#!" // Use #! for inert links
                      className="text-decoration-none d-flex justify-content-between"
                    >
                      <span>Funny </span>
                      <span className="text-black">(1)</span>
                    </a>
                  </li>
                </ul>
              </div>
              {/* Filters can go here */}
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Shop;