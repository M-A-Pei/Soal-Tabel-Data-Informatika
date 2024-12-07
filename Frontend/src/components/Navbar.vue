<template>
    <nav class="navbar">
      <div class="navbar-brand"><router-link to="/" style="color: white; text-decoration: none">Frontend</router-link></div>
      <ul class="navbar-links">
        <li><router-link to="/">Products</router-link></li>
        <li><router-link to="/orders">Orders</router-link></li>
      </ul>
    </nav>
  </template>
  
  <style scoped>
  /* Basic navbar styling */
  .navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    background-color: #333;
    color: white;
    height: 60px;
  }
  
  /* Brand name */
  .navbar-brand {
    font-size: 1.5em;
    font-weight: bold;
  }
  
  /* Navbar links */
  .navbar-links {
    list-style: none;
    padding: 0;
    display: flex;
    gap: 15px;
  }
  
  .navbar-links li {
    cursor: pointer;
  }
  
  .navbar-links a {
    text-decoration: none;
    color: white;
    transition: color 0.2s ease;
  }
  
  .navbar-links a:hover {
    color: #aaa;
  }
  </style>
  