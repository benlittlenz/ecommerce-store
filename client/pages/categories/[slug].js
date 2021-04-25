import React, { useState, useEffect } from 'react';

export default function Home({ products }) {
    console.log('hey')
    console.log(products)
    return (
        <>
        <section>
            {products.data?.map(product => (
                <div>{product.name}</div>
            ))}
        </section>
        </>

    )
}

export const getStaticPaths = async () => {
    const res = await fetch(`http://localhost:8000/api/categories`)
    const { data } = await res.json();

    const paths = data.map(category => {
        console.log(category)
        return {
            params: { slug: category.slug }
        }
    })
    return {
        paths,
        fallback: false,
    }
}

export const getStaticProps = async ({ params }) => {
    console.log("PARAMS", params)
    const slug = params.slug;

    const response = await fetch(`http://localhost:8000/api/products?category=${slug}`)
    const products = await response.json();

    return {
        props: { products }
    }
}