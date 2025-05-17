import React from "react";

const Login = ({ onSuccess, onSwitch }) => {
  const handleLogin = (e) => {
    e.preventDefault();
    // Simulate login success
    onSuccess();
  };

  return (
    <form onSubmit={handleLogin}>
      <div className="mb-3">
        <label htmlFor="loginEmail" className="form-label">
          Email address
        </label>
        <input
          type="email"
          className="form-control"
          id="loginEmail"
          placeholder="Enter your email"
          required
        />
      </div>
      <div className="mb-3">
        <label htmlFor="loginPassword" className="form-label">
          Password
        </label>
        <input
          type="password"
          className="form-control"
          id="loginPassword"
          placeholder="Enter your password"
          required
        />
      </div>
      <button type="submit" className="btn btn-primary w-100">
        Login
      </button>
      <p className="mt-3 text-center">
        Don't have an account?{" "}
        <button type="button" className="btn btn-link p-0" onClick={onSwitch}>
          Register
        </button>
      </p>
    </form>
  );
};

export default Login;
