import React, { useState, useEffect } from 'react';
import axios from 'axios';
import { useRouter } from 'next/router'

export default function Home({product}) {
    console.log(product)
    return (
        <div>
            dsffdsfdsd
            Name: {product.data.name}
            Slug: {product.data.slug}
        </div>
    )
}

export const getStaticPaths = async () => {
    const res = await fetch(`http://localhost:8000/api/products`)
    const { data } = await res.json();

    const paths = data.map(product => {
        return {
            params: { slug: product.slug }
        }
    })
    return {
        paths,
        fallback: false,
    }
}

export const getStaticProps = async ({ params }) => {
    const slug = params.slug;

    const response = await fetch(`http://localhost:8000/api/products/${slug}`)
    const product = await response.json();

    return {
        props: { product }
    }
}