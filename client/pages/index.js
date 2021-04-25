import React, { useState } from 'react';
import Head from 'next/head'
import styles from '../styles/Home.module.css'

import Navigation from '../components/Navigation'
import CartSideMenu from '../components/CartSideMenu'

export default function Home({ categories }) {
  const [menuOpen, setMenuOpen] = useState(false);

  console.log(categories)
  return (
    <div className="bg-white">
      <Navigation categories={categories} open={() => setMenuOpen(true)}/>
      {menuOpen ? (
        <CartSideMenu close={() => setMenuOpen(false)}/>
      ) : <></>}

    </div>
  )
}

export async function getServerSideProps() {
  // Fetch data from external API
  const res = await fetch(`http://localhost:8000/api/categories`)
  const data = await res.json()

  return { props: { categories: data } }
}
