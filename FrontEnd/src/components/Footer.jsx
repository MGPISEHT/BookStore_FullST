import React from "react";
import hero_2 from "../assets/images/logo-book.png";

const Footer = () => {
  return (
    <div>
      <footer className="site-footer border-top">
        <div className="container">
          <div className="row">
            <div className="col-lg-6 mb-5 mb-lg-0">
              <div className="row">
                <div className="col-md-12">
                  <h3 className="footer-heading mb-4">Navigations</h3>
                </div>
                <div className="col-md-6 col-lg-4">
                  <ul className="list-unstyled">
                    <li>
                      <a className="text-decoration-none" href="#">
                        Sell online
                      </a>
                    </li>
                    <li>
                      <a className="text-decoration-none" href="#">
                        Features
                      </a>
                    </li>
                    <li>
                      <a className="text-decoration-none" href="#">
                        Shopping cart
                      </a>
                    </li>
                    <li>
                      <a className="text-decoration-none" href="#">
                        Store builder
                      </a>
                    </li>
                  </ul>
                </div>
                <div className="col-md-6 col-lg-4">
                  <ul className="list-unstyled">
                    <li>
                      <a className="text-decoration-none" href="#">
                        Mobile commerce
                      </a>
                    </li>
                    <li>
                      <a className="text-decoration-none" href="#">
                        Dropshipping
                      </a>
                    </li>
                    <li>
                      <a className="text-decoration-none" href="#">
                        Website development
                      </a>
                    </li>
                  </ul>
                </div>
                <div className="col-md-6 col-lg-4">
                  <ul className="list-unstyled">
                    <li>
                      <a className="text-decoration-none" href="#">
                        Point of sale
                      </a>
                    </li>
                    <li>
                      <a className="text-decoration-none" href="#">
                        Hardware
                      </a>
                    </li>
                    <li>
                      <a className="text-decoration-none" href="#">
                        Software
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div className="col-md-6 col-lg-3 mb-4 mb-lg-0">
              <h3 className="footer-heading mb-4">Promo</h3>
              <a href="#" className="block-6 text-decoration-none">
                <img
                  src={hero_2}
                  alt="Promo"
                  className="img-fluid rounded mb-4"
                />
                <h3 className="font-weight-light mb-0">
                  Finding Your Perfect Books
                </h3>
                <p>Promo from April 15 &mdash; 30, 2025</p>
              </a>
            </div>

            <div className="col-md-6 col-lg-3">
              <div className="block-5 mb-5">
                <h3 className="footer-heading mb-4">Contact Info</h3>
                <ul className="list-unstyled">
                  <li className="address">
                    203 Fake St. Mountain View, San Francisco, California, USA
                  </li>
                  <li className="phone text-decoration-none">
                    <a clasName="text-decoration-none">
                      <p>+2 392 3929 210</p>
                    </a>
                  </li>
                  <li className="email">emailaddress@domain.com</li>
                </ul>
              </div>

              <div className="block-7">
                <form action="#" method="post">
                  <label htmlFor="email_subscribe" className="footer-heading">
                    Subscribe
                  </label>
                  <div className="form-group">
                    <input
                      type="email"
                      className="form-control py-4"
                      id="email_subscribe"
                      placeholder="Email"
                      required
                    />
                    <input
                      type="submit"
                      className="btn btn-sm btn-primary"
                      value="Send"
                    />
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div className="row pt-5 mt-5 text-center"></div>
        </div>
      </footer>
    </div>
  );
};

export default Footer;
