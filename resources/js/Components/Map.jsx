import { MapContainer, TileLayer, Marker, Popup, useMapEvents } from "react-leaflet";
import "leaflet/dist/leaflet.css";

export default function Map({ userGeo }) {
  // Calculate center and zoom dynamically based on userGeo
  const bounds = userGeo.reduce(
    (acc, user) => [
      ...acc,
      [user.geolocation_latest.latitude, user.geolocation_latest.longitude],
    ],
    []
  );

  return (
    <MapContainer
      bounds={bounds} // Set the bounds to ensure all markers are visible
      style={{ height: window.innerHeight - 65 - 75 }}
      scrollWheelZoom={false}
    >
      <TileLayer
        attribution=''
        url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
      />
      <MarkersWithPopup userGeo={userGeo} />
    </MapContainer>
  );
}

function MarkersWithPopup({ userGeo }) {
  const map = useMapEvents({
    click: () => {
      // Reset map view to the initial bounds when clicking outside markers
      map.flyToBounds(bounds);
    },
  });

  return (
    <>
      {userGeo.map((user) => (
        <Marker
          key={user.id}
          position={[
            user.geolocation_latest.latitude,
            user.geolocation_latest.longitude,
          ]}
          eventHandlers={{
            click: () => {
              // Set the center of the map to the clicked marker
              map.flyTo(
                [
                  user.geolocation_latest.latitude,
                  user.geolocation_latest.longitude,
                ],
                18
              );
            },
          }}
        >
          <Popup>
            <div>Name: {user.name}</div>
            <div>Status: {user.geolocation_latest.status}</div>
            <div>Battery: {user.geolocation_latest.battery_level}%</div>
          </Popup>
        </Marker>
      ))}
    </>
  );
}