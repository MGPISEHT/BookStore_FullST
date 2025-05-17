import { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';

const Shop = ({ handleAddToCart }) => {
  const [products, setProducts] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  useEffect(() => {
    fetch('http://127.0.0.1:8000/api/books/')
      .then((response) => {
        if (!response.ok) {
          throw new Error('Failed to fetch products');
        }
        return response.json();
      })
      .then((data) => {
        setProducts(data.books); // <--- Make sure your API returns { books: [...] }
        setLoading(false);
      })
      .catch((error) => {
        setError(error.message);
        setLoading(false);
      });
      
  }, []);

  if (loading) return <p>Loading products...</p>;
  if (error) return <p>Error: {error}</p>;

  return (
    <div className="site-wrap">
      {/* Breadcrumbs */}
      <div className="bg-light py-3">
        <div className="container">
          <div className="row">
            <div className="col-md-12 mb-0">
              <Link to="/">Home</Link> <span className="mx-2 mb-0">/</span>
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
                {products.map((product) => (
                  <div
                    className="col-sm-6 col-lg-4 mb-4"
                    key={product.id}
                    data-aos="fade-up"
                  >
                    <div className="block-4 text-center border rounded">
                      <div style={{ width: '304px', height: '360px' }}>
                        <figure
                          className="block-4-image"
                          style={{ height: '170px' }}
                        >
                          <Link to={`/shop-single/${product.id}`}>
                            <img
                              src={`http://127.0.0.1:8000/storage/${product.cover_image}`}
                              alt={product.title}
                              className="img-fluid"
                              style={{ width: '100px', marginTop: '10px' }}
                            />
                          </Link>
                        </figure>
                        <div
                          className="block-4-text p-3"
                          style={{ height: '173px' }}
                        >
                          <h3
                            style={{
                              fontSize: '1rem',
                              fontFamily: 'revert',
                              height: '110px',
                            }}
                          >
                            <Link to={`/shop-single/${product.id}`}>
                              {product.title}
                            </Link>
                          </h3>
                          <p className="text-danger font-weight-bold">
                            ${product.price}
                            <Link
                              onClick={() => handleAddToCart(product)}
                              to="/cart"
                              className="buy-now btn fw-bold btn-info btn-outline"
                              style={{
                                width: '100px',
                                height: '30px',
                                marginLeft: '50px',
                                fontSize: '12px',
                                color: 'white',
                              }}
                            >
                              Add Cart
                            </Link>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                ))}
              </div>

              {/* Pagination */}
              <div className="row" data-aos="fade-up">
                <div className="col-md-12 text-center">
                  <div className="site-block-27">
                    <ul className="justify-content-center">
                      <li className="page-item">
                        <a className="page-link rounded-circle me-2" href="#">
                          &lt;
                        </a>
                      </li>
                      <li className="page-item active me-1">
                        <span className="page-link">1</span>
                      </li>
                      <li className="page-item me-1">
                        <a className="page-link" href="#">
                          2
                        </a>
                      </li>
                      <li className="page-item me-1">
                        <a className="page-link" href="#">
                          3
                        </a>
                      </li>
                      <li className="page-item me-1">
                        <a className="page-link" href="#">
                          4
                        </a>
                      </li>
                      <li className="page-item me-1">
                        <a className="page-link" href="#">
                          5
                        </a>
                      </li>
                      <li className="page-item me-1">
                        <a className="page-link rounded-circle ms-2" href="#">
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
                      href="#"
                      className="text-decoration-none d-flex justify-content-between"
                    >
                      <span>Science </span>
                      <span className="text-black">(1)</span>
                    </a>
                  </li>
                  <li className="mb-1">
                    <a
                      href="#"
                      className="text-decoration-none d-flex justify-content-between"
                    >
                      <span>Laravel </span>
                      <span className="text-black">(4)</span>
                    </a>
                  </li>
                  <li className="mb-1">
                    <a
                      href="#"
                      className="text-decoration-none d-flex justify-content-between"
                    >
                      <span>Funny </span>
                      <span className="text-black">(1)</span>
                    </a>
                  </li>
                </ul>
              </div>

              {/* Filters */}
              
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Shop;
