import React from 'react';
import Link from 'next/link'

function Navigation({categories}) {
    console.log(categories)
    return (
        <div className="flex-1 flex flex-col">
		<nav className="px-4 flex justify-between bg-white h-16 border-b-2">

			<ul className="flex items-center">
            {categories.data.map(category => (
                <li>
					<h1 className="pl-8 pr-4 lg:pl-0 text-gray-700">{category.slug}</h1>
				</li>
            ))}
			</ul>

		</nav>
	</div>
        // <ul>
        //     {categories.data.map(category => (
        //         <li>
        //         <Link href="/">
        //             <a>{category.slug}</a>
        //         </Link>
        //     </li>
        //     ))}

        // </ul>
    )
}

export default Navigation;