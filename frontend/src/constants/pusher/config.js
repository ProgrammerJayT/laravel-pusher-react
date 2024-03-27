import Pusher from "pusher-js";

const config = {
  cluster: "mt1",
  pusherKey: "b737e6122155fa8f8801",
};

export const pusher = new Pusher(config.pusherKey, {
  cluster: config.cluster,
});
