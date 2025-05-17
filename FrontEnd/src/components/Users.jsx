import React from 'react';

class Users extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      error: null,
      isLoaded: false,
      books: [],
    };
  }

  componentDidMount() {
    fetch('http://127.0.0.1:8000/api/books/')
      .then((res) => res.json())
      .then(
        (result) => {
          this.setState({
            isLoaded: true,
            books: result.books,
          });
        },
        // Note: it's important to handle errors here
        (error) => {
          this.setState({
            isLoaded: true,
            error,
          });
        }
      );
  }

  render() {
    const { error, isLoaded, books } = this.state;
    if (error) {
      return <div>Error: {error.message}</div>;
    } else if (!isLoaded) {
      return <div>Loading...</div>;
    } else {
      return (
        <ul>
          {books.map((book) => (
            <li key={book.id}>
              {book.title} {book.price}
              <img
                src={`http://127.0.0.1:8000/storage/${book.cover_image}`}
                alt={book.title}
                style={{ width: '50px', height: '50px' }}
              />
            </li>
          ))}
        </ul>
      );
    }
  }
}

export default Users;
