import React from 'react'
import icone from './logo.jpg'
const Navbar = () => {
    return(
            <nav className='navbar bg-primary'>
              <img src={icone} style={{maxWidth: '5em', maxHeight: '5em'}}/>
                <h1>
                  Glutt immo
                </h1>
            </nav>
        )
}

export default Navbar
