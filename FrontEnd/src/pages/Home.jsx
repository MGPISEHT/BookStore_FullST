import men from '../assets/images/science-book.jpg';
import blog_1 from '../assets/images/discound-50.jpg';
import children from '../assets/images/funny-book.jpg';
import shoe from '../assets/images/book-store-slide1.png';
const Home = () => {
  return (
    <div className="site-wrap">
      <div>
        <div className="site-blocks-cover" data-aos="fade">
          <img src={shoe} alt="show" className="w-100" h-100 />
          <div className="container">
            <div className="row align-items-start align-items-md-center justify-content-end"></div>
          </div>
        </div>
      </div>

      <div className="site-section site-section-sm site-blocks-1 mt-5">
        <div className="container">
          <div className="row">
            <div
              className="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4"
              data-aos="fade-up"
              data-aos-delay=""
            >
              <div className="icon mr-4 align-self-start">
                <span className="icon-truck"></span>
              </div>
              <div className="text">
                <h2 className="text-uppercase">Free Shipping</h2>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  Phasellus at iaculis quam. Integer accumsan tincidunt
                  fringilla.
                </p>
              </div>
            </div>
            <div
              className="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4"
              data-aos="fade-up"
              data-aos-delay="100"
            >
              <div className="icon mr-4 align-self-start">
                <span className="icon-refresh2"></span>
              </div>
              <div className="text">
                <h2 className="text-uppercase">Free Returns</h2>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  Phasellus at iaculis quam. Integer accumsan tincidunt
                  fringilla.
                </p>
              </div>
            </div>
            <div
              className="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <div className="icon mr-4 align-self-start">
                <span className="icon-help"></span>
              </div>
              <div className="text">
                <h2 className="text-uppercase">Customer Support</h2>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  Phasellus at iaculis quam. Integer accumsan tincidunt
                  fringilla.
                </p>
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
                  <img src={shoe} alt="" className="img-fluid" />
                </figure>
                <div className="text">
                  {/* <span className="text-uppercase">sotre</span> */}
                  <h3>Stores</h3>
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
                  {/* <span className="text-uppercase">Collections</span> */}
                  <h3>Funny Books</h3>
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
                  {/* <span className="text-uppercase">Collections</span> */}
                  <h3>Science Books</h3>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div className="site-section block-8">
        <div className="container">
          <div className="row justify-content-center mb-5">
            <div className="col-md-7 site-section-heading text-center pt-4">
              <h2>Big Sale!</h2>
            </div>
          </div>
          <div className="row align-items-center">
            <div className="col-md-12 col-lg-7 mb-5">
              <a href="#">
                <img
                  src={blog_1}
                  alt="Image placeholder"
                  className="img-fluid rounded"
                />
              </a>
            </div>
            <div className="col-md-12 col-lg-5 text-center pl-md-5">
              <h2>
                <a className="text-decoration-none" href="#">
                  50% off all items
                </a>
              </h2>
              <p className="post-meta mb-4">
                By
                <a className="text-decoration-none" href="#">
                  BookStores
                </a>
                <span className="block-8-sep">;</span> April 20, 2025
              </p>
              <p>
                If you buy 5 or more books, you will receive a discount of up to
                50%. Hurry up, the discount is for a limited time, don't miss
                this opportunity.
              </p>
              <p>
                <a href="#" className="btn btn-primary btn-sm">
                  Shop Now
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Home;
