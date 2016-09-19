#include "Hal.h"

#include "Devices.h"

void setup()
{
  debugSerial.begin(115200);
  debugSerial.println("Serial connection active");

  HalImpl.setDiag(debugSerial);
  HalImpl.initHal();
}

void loop()
{
  HalImpl.Update();
  HalImpl.CheckAndAct();
  
  delay(10);
}

