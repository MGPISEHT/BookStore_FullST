import "../../node_modules/bootstrap/dist/css/bootstrap.min.css";
import women from "../assets/images/women.png";
import men from "../assets/images/men.png";
import book from "../assets/images/book-v1.png";

import children from "../assets/images/children.png";
const Abuot = () => {
  return (
    <div>
      <div className="site-wrap">
        <div className="bg-light py-3">
          <div className="container">
            <div className="row">
              <div className="col-md-12 mb-0">
                <a href="/">Home</a> <span className="mx-2 mb-0">/</span>
                <strong className="text-black">About</strong>
                <div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>

        <div className="site-section border-bottom" data-aos="fade">
          <div className="container">
            <div className="row mb-5">
              <div className="col-md-6">
                <div className="block-16">
                  <figure>
                    <img
                      src={book}
                      alt="Image placeholder"
                      className="img-fluid rounded"
                    />
                    <a
                      href="https://vimeo.com/channels/staffpicks/93951774"
                      className="play-button popup-vimeo"
                    >
                      <span className="ion-md-play"></span>
                    </a>
                  </figure>
                </div>
              </div>
              <div className="col-md-1"></div>
              <div className="col-md-5">
                <div className="site-section-heading pt-3 mb-4">
                  <h2 className="text-black">How We Started</h2>
                </div>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius
                  repellat, dicta at laboriosam, nemo exercitationem itaque
                  eveniet architecto cumque, deleniti commodi molestias
                  repellendus quos sequi hic fugiat asperiores illum. Atque, in,
                  fuga excepturi corrupti error corporis aliquam unde nostrum
                  quas.
                </p>
                <p>
                  Accusantium dolor ratione maiores est deleniti nihil?
                  Dignissimos est, sunt nulla illum autem in, quibusdam cumque
                  recusandae, laudantium minima repellendus.
                </p>
              </div>
            </div>
          </div>
        </div>

        <div className="site-section border-bottom" data-aos="fade">
          <div className="container">
            <div className="row justify-content-center mb-5">
              <div className="col-md-7 site-section-heading text-center pt-4">
                <h2>The Team</h2>
              </div>
            </div>
            <div className="row">
              <div className="col-md-6 col-lg-3">
                <div className="block-38 text-center">
                  <div className="block-38-img">
                    <div className="block-38-header">
                      <img src={men} alt="Image placeholder" className="mb-4" />
                      <h3 className="block-38-heading h4">Elizabeth Graham</h3>
                      <p className="block-38-subheading">CEO/Co-Founder</p>
                    </div>
                    <div className="block-38-body">
                      <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Vitae aut minima nihil sit distinctio recusandae
                        doloribus ut fugit officia voluptate soluta.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div className="col-md-6 col-lg-3">
                <div className="block-38 text-center">
                  <div className="block-38-img">
                    <div className="block-38-header">
                      <img
                        src={women}
                        alt="Image placeholder"
                        className="mb-4"
                      />
                      <h3 className="block-38-heading h4">Jennifer Greive</h3>
                      <p className="block-38-subheading">Co-Founder</p>
                    </div>
                    <div className="block-38-body">
                      <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Vitae aut minima nihil sit distinctio recusandae
                        doloribus ut fugit officia voluptate soluta.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div className="col-md-6 col-lg-3">
                <div className="block-38 text-center">
                  <div className="block-38-img">
                    <div className="block-38-header">
                      <img
                        src={children}
                        alt="Image placeholder"
                        className="mb-4"
                      />
                      <h3 className="block-38-heading h4">Patrick Marx</h3>
                      <p className="block-38-subheading">Marketing</p>
                    </div>
                    <div className="block-38-body">
                      <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Vitae aut minima nihil sit distinctio recusandae
                        doloribus ut fugit officia voluptate soluta.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div className="col-md-6 col-lg-3">
                <div className="block-38 text-center">
                  <div className="block-38-img">
                    <div className="block-38-header">
                      <img src={men} alt="Image placeholder" className="mb-4" />
                      <h3 className="block-38-heading h4">Mike Coolbert</h3>
                      <p className="block-38-subheading">Sales Manager</p>
                    </div>
                    <div className="block-38-body">
                      <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Vitae aut minima nihil sit distinctio recusandae
                        doloribus ut fugit officia voluptate soluta.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div className="site-section site-blocks-2">
          <div className="container">
            <div className="row">
              <div
                className="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0"
                data-aos="fade"
                data-aos-delay=""
              >
                <a className="block-2-item" href="#">
                  <figure className="image">
                    <img src={women} alt="" className="img-fluid" />
                  </figure>
                  <div className="text">
                    <span className="text-uppercase">Collections</span>
                    <h3>Women</h3>
                  </div>
                </a>
              </div>
              <div
                className="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0"
                data-aos="fade"
                data-aos-delay="100"
              >
                <a className="block-2-item" href="#">
                  <figure className="image">
                    <img src={children} alt="" className="img-fluid" />
                  </figure>
                  <div className="text">
                    <span className="text-uppercase">Collections</span>
                    <h3>Children</h3>
                  </div>
                </a>
              </div>
              <div
                className="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0"
                data-aos="fade"
                data-aos-delay="200"
              >
                <a className="block-2-item" href="#">
                  <figure className="image">
                    <img src={men} alt="" className="img-fluid" />
                  </figure>
                  <div className="text">
                    <span className="text-uppercase">Collections</span>
                    <h3>Men</h3>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Abuot;
