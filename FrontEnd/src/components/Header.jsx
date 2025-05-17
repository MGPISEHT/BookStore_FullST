import React from 'react';
import Login from './Login';
import Register from './Register';
import { useState } from 'react';

const Header = ({ cartCount }) => {
  const [showModal, setShowModal] = useState(false);
  const [isLogin, setIsLogin] = useState(true); // Toggle between Login and Register
  const [isAuthenticated, setIsAuthenticated] = useState(false); // User authentication state

  const handleModalToggle = () => {
    setShowModal(!showModal);
  };

  const handleAuthToggle = () => {
    setIsLogin(!isLogin); // Toggle between Login and Register forms
  };

  const handleLoginSuccess = () => {
    setIsAuthenticated(true);
    setShowModal(false); // Close modal after login
  };

  return (
    <div>
      <header className="site-navbar " role="banner">
        <div className="site-navbar-top ">
          <div className="container">
            <div className="row flex justify-between items-center">
              {/* Logo */}
              <div className="col-12 col-md-4 text-center order-1 order-md-2 mb-3 mb-md-0">
                <div className="site-logo">
                  <a
                    href="/"
                    className="js-logo-clone text-info text-decoration-none"
                  >
                    Bookstore
                  </a>
                </div>
              </div>
              <div className="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                <form action="" className="site-block-top-search">
                  <span className="icon icon-search2"></span>
                  <input
                    type="text"
                    className="form-control border-0"
                    placeholder="Search"
                  />
                </form>
              </div>
              {/* Cart and Icons */}
              <div className="col-6 col-md-4 text-end order-3">
                <div className="site-top-icons">
                  <ul className="list-unstyled d-flex justify-content-end mb-0">
                    {!isAuthenticated && (
                      <li className="me-3">
                        <a href="#" onClick={handleModalToggle}>
                          <span className="icon icon-person"></span>
                        </a>
                      </li>
                    )}
                    <li className="me-3">
                      <a
                        href="/cart"
                        className="site-cart text-decoration-none"
                      >
                        <span className="icon icon-shopping_cart"></span>
                        <span className="count">{cartCount}</span>
                      </a>
                    </li>
                    <li className="d-md-none">
                      <a href="#" className="site-menu-toggle js-menu-toggle">
                        <span className="icon icon-menu"></span>
                      </a>
                    </li>
                  </ul>
                </div>

                {/* Login/Register Modal */}
                {showModal && (
                  <div
                    className="modal fade show d-block"
                    tabIndex="-1"
                    style={{ backgroundColor: 'rgba(0,0,0,0.5)' }}
                  >
                    <div className="modal-dialog modal-dialog-centered">
                      <div className="modal-content">
                        <div className="modal-header">
                          <h5 className="modal-title">
                            {isLogin ? 'Login' : 'Register'}
                          </h5>
                          <button
                            type="button"
                            className="btn-close"
                            onClick={handleModalToggle}
                          ></button>
                        </div>
                        <div className="modal-body">
                          {isLogin ? (
                            <Login
                              onSuccess={handleLoginSuccess}
                              onSwitch={handleAuthToggle}
                            />
                          ) : (
                            <Register onSwitch={handleAuthToggle} />
                          )}
                        </div>
                      </div>
                    </div>
                  </div>
                )}
              </div>
            </div>
          </div>
        </div>

        <nav
          className="site-navigation text-right text-md-center"
          role="navigation"
        >
          <div className="container">
            <ul className="site-menu js-clone-nav d-none d-md-block list-unstyled d-flex justify-content-center">
              <li className="has-children active">
                <a href="/">Home</a>
                {/* <ul className="dropdown">
                  <li>
                    <a href="#">Menu One</a>
                  </li>
                  <li>
                    <a href="#">Menu Two</a>
                  </li>
                  <li>
                    <a href="#">Menu Three</a>
                  </li>
                  <li className="has-children">
                    <a href="#">Sub Menu</a>
                    <ul className="dropdown">
                      <li>
                        <a href="#">Menu One</a>
                      </li>
                      <li>
                        <a href="#">Menu Two</a>
                      </li>
                      <li>
                        <a href="#">Menu Three</a>
                      </li>
                    </ul>
                  </li>
                </ul> */}
              </li>
              <li className="has-children">
                <a href="/about">About</a>
                {/* <ul className="dropdown">
                  <li>
                    <a href="#">Menu One</a>
                  </li>
                  <li>
                    <a href="#">Menu Two</a>
                  </li>
                  <li>
                    <a href="#">Menu Three</a>
                  </li>
                </ul> */}
              </li>
              <li>
                <a href="/shop">Shop</a>
              </li>

              <li>
                <a href="/contact">Contact</a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
    </div>
  );
};

export default Header;
