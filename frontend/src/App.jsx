import React, { useState, useEffect } from "react";
import { pusher } from "./constants/pusher/config";
import "./App.css";

const App = () => {
  const [message, setMessage] = useState(null);

  useEffect(() => {
    const channel = pusher.subscribe("laravel-pusher-react");
    channel.bind("message-sent", (data) => {
      console.log("Received data:", data);
      setMessage(data.message); // Assuming 'messages' is the property containing the message data
    });

    return () => {
      // Unsubscribe from Pusher channel when component unmounts
      pusher.unsubscribe("laravel-pusher-react");
    };
  }, []);

  return (
    <div>
      {message ? (
        <div>
          <p>Time: {message.created_at}</p>
          <p>Message: {message.message}</p>
        </div>
      ) : (
        <div>Waiting...</div>
      )}
    </div>
  );
};

export default App;
