import { OverlayScrollbars } from "overlayscrollbars";

const overlay = () => {

  OverlayScrollbars(document.body, {
    overflow: {
      x: "hidden",
      y: "scroll",
    },
    scrollbars: {
      theme: "os-theme-body",
    },
  });
};

export const init = () => {

  overlay();
};