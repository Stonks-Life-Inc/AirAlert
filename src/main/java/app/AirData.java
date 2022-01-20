package app;

import lombok.Data;

@Data
public class AirData {
	private int id;
	private String dateMesure;
	private int so2;
	private int no2;
	private int o3;
	private int pm10;
}
