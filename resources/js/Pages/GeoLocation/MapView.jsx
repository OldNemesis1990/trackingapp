import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import React, { useState, useEffect } from 'react';
import Map from '@/Components/Map'
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

export default function MapView({ auth, usersWithGeolocation }) {
    useEffect(() => {
        const pusher = new Pusher(import.meta.env.VITE_PUSHER_APP_KEY, {
            cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
        });

        window.Echo = new Echo({
            broadcaster: 'pusher',
            key: import.meta.env.VITE_PUSHER_APP_KEY,
            cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
            encrypted: true, // Adjust this based on your Pusher configuration
        });

        const channel = window.Echo.channel('geolocation-updates');

        channel.listen('App\\Events\\GeolocationUpdated', (data) => {
            setUsersWithGeolocation((prevUsers) =>
                prevUsers.map((user) =>
                    console.log(user)
                    // user.id === data.user_id ? { ...user, geolocation_latest: data.geolocation_latest } : user
                )
            );
        });

        return () => {
            channel.unbind();
            window.Echo.leave('geolocation-updates');
        };
    }, []);

    return(
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Dashboard</h2>}
        >
            <Head title="map-test" />

            <Map userGeo={usersWithGeolocation} />
            
        </AuthenticatedLayout>
    )
}