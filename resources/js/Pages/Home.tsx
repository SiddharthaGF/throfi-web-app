import React from 'react';
import { Link, Head } from '@inertiajs/inertia-react';
import route from 'ziggy-js';


export default function Welcome() {
    return (
        <>
           <a href={route('welcome')}>clic me!</a>
        </>
    )}
