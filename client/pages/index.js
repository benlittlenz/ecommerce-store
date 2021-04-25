import React, { useState } from 'react';

import Navigation from '../components/Navigation'
import CartSideMenu from '../components/CartSideMenu'
import CategoryList from '../components/CategoryList'
import ProductList from '../components/ProductList'

export default function Home({ categories, products }) {
  const [menuOpen, setMenuOpen] = useState(false);

  console.log(categories)
  return (
    <div className="bg-white">
      <Navigation categories={categories} open={() => setMenuOpen(true)} />
      {menuOpen ? (
        <CartSideMenu close={() => setMenuOpen(false)} />
      ) : <></>}
      <main class="my-8">
        <div class="container mx-auto px-6">
          <CategoryList categories={categories} />
          <div class="mt-16">
            <ProductList products={products} />
          </div>
        </div>
      </main>
    </div>
  )
}

export async function getServerSideProps() {
  // Fetch data from external API
  const categoriesRes = await fetch(`http://localhost:8000/api/categories`)
  const categories = await categoriesRes.json()

  const productsRes = await fetch(`http://localhost:8000/api/products`)
  const products = await productsRes.json()

  return { props: { categories, products } }
}
