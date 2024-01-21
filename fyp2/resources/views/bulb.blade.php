<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      background-color: #1d1e22;
      margin: 0;
      display: flex;
      justify-content: center;
    }

    .bulb-container {
      width: 300px;
      height: 500px;
      position: absolute;
      display: flex;
      flex-direction: column;
      align-items: center;
      z-index: 1;
      transform-origin: top;
      animation: swing 3s ease-in-out infinite;
    }

    .wire {
      width: 4px;
      height: 250px;
      background: black;
      position: relative;
      z-index: 1;
    }

    .connector {
      background: #292929;
      width: 30px;
      aspect-ratio: 4/5;
      border-radius: 1px;
      display: flex;
      flex-direction: column;
      justify-content: space-evenly;
      align-items: center;
      z-index: 2;
    }

    .grove {
      background: #424242;
      width: 34px;
      height: 3px;
      z-index: 3;
    }

    .bulb {
      margin-top: -2px;
      width: 92px;
      aspect-ratio: 1;
      border-radius: 50%;
      background: #ffeb00;
      border: 1px solid rgba(255, 255, 255, 0.1);
      box-shadow: 0px 0px 150px 75px rgba(245, 223, 77, 1);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: flex-start;
      gap: -1px;
      z-index: 1;
      animation: flash 10s linear infinite;
    }

    .metal-wire {
      position: relative;
      border: 1px solid black;
      width: 22px;
      height: 11px;
      border-radius: 50%;
      z-index: 2;
    }

    .metal-wire:nth-child(1) {
      top: -1px;
    }

    .metal-wire:nth-child(2) {
      top: -7px;
    }

    .metal-wire:nth-child(3) {
      top: -13px;
    }

    @keyframes swing {
      0% {
        transform: rotate(15deg);
      }

      50% {
        transform: rotate(-15deg);
      }

      100% {
        transform: rotate(15deg);
      }
    }

    @keyframes flash {
      0% {
        background: rgba(255, 255, 255, 0.1);
        box-shadow: 0px 0px 0px 0px transparent;
      }

      1% {
        background: rgba(255, 235, 0, 1);
        box-shadow: 0px 0px 150px 75px rgba(245, 223, 77, 1);
      }

      1.001% {
        background: rgba(255, 255, 255, 0.1);
        box-shadow: 0px 0px 0px 0px transparent;
      }

      10% {
        background: rgba(255, 255, 255, 0.1);
        box-shadow: 0px 0px 0px 0px transparent;
      }

      11.001% {
        background: rgba(255, 235, 0, 1);
        box-shadow: 0px 0px 150px 75px rgba(245, 223, 77, 1);
      }

      11.002% {
        background: rgba(255, 255, 255, 0.1);
        box-shadow: 0px 0px 0px 0px transparent;
      }

      12% {
        background: rgba(255, 235, 0, 1);
        box-shadow: 0px 0px 150px 75px rgba(245, 223, 77, 1);
      }

      /* ... continue the rest of the keyframes ... */

      83.003% {
        background: rgba(255, 255, 255, 0.1);
        box-shadow: 0px 0px 0px 0px transparent;
      }

      88% {
        background: rgba(255, 235, 0, 1);
        box-shadow: 0px 0px 150px 75px rgba(245, 223, 77, 1);
      }
    }



    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Courier New', Courier, monospace;
}

.container {
    display: flex;
    justify-content: space-around;
    align-items: center;
    flex-wrap: wrap;
    width: 100%;
    min-height: 100vh;
    background: #0e1538;
}

a {
    position: relative;
    padding: 20px 60px;
    display: flex;
    justify-content: center;
    align-items: center;
    background: rgba(0, 0, 0, 0.5);
    margin: 40px;
    transition: 1s;
    overflow: hidden;
    text-decoration: none;
}

a:hover {
    background: var(--clr);
    box-shadow: 0 0 10px var(--clr),
                0 0 30px var(--clr),
                0 0 60px var(--clr),
                0 0 100px var(--clr);
}

a::before {
    content: "";
    position: absolute;
    width: 40px;
    height: 400%;
    background: var(--clr);
    transition: 1s;
    animation: animate 2s linear infinite;
    animation-delay: calc(0.33s * var(--i));
}

a:hover::before {
    width: 120%;
}

@keyframes animate {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}

a::after {
    content: "";
    position: absolute;
    background: #0e1538;
    inset: 4px;
    transition: 0.5s;
}

a:hover::after {
    background: var(--clr);
}

a span {
    position: relative;
    z-index: 1;
    font-size: 2em;
    color: #fff;
    opacity: 0.8;
    text-transform: uppercase;
    letter-spacing: 4px;
    transition: 0.5s;
}

a:hover span {
    opacity: 1;
    color: #0e1538;
}
  </style>
  <title>Bulb Animation</title>
</head>
<body>
  <div class="bulb-container">
    <div class="wire"></div>
    <div class="connector">
      <div class="grove"></div>
      <div class="grove"></div>
      <div class="grove"></div>
    </div>
    <div class="bulb">
      <div class="metal-wire"></div>
      <div class="metal-wire"></div>
      <div class="metal-wire"></div>
    </div>
  </div>
</br></br></br></br></br>
  <div class="container">
  
  <a href="/" style="margin-top: 38%;--clr:#00ccff; --i:1">
    <span>Enter Now</span>
  </a>
  
</div>

</body>
</html>
