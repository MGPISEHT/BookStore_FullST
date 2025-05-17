import React from "react";

const Register = ({ onSwitch }) => {
  const handleRegister = (e) => {
    e.preventDefault();
    // Simulate registration success
    alert("Registration successful!");
    onSwitch(); // Redirect to login form
  };

  return (
    <form onSubmit={handleRegister}>
      <div className="mb-3">
        <label htmlFor="registerName" className="form-label">
          Full Name
        </label>
        <input
          type="text"
          className="form-control"
          id="registerName"
          placeholder="Enter your full name"
          required
        />
      </div>
      <div className="mb-3">
        <label htmlFor="registerEmail" className="form-label">
          Email address
        </label>
        <input
          type="email"
          className="form-control"
          id="registerEmail"
          placeholder="Enter your email"
          required
        />
      </div>
      <div className="mb-3">
        <label htmlFor="registerPassword" className="form-label">
          Password
        </label>
        <input
          type="password"
          className="form-control"
          id="registerPassword"
          placeholder="Enter your password"
          required
        />
      </div>
      <button type="submit" className="btn btn-primary w-100">
        Register
      </button>
      <p className="mt-3 text-center">
        Already have an account?{" "}
        <button type="button" className="btn btn-link p-0" onClick={onSwitch}>
          Login
        </button>
      </p>
    </form>
  );
};

export default Register;
