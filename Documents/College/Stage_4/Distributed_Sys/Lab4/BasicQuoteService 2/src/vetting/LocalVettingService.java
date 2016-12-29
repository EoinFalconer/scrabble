package vetting;

import java.util.HashMap;
import java.util.Map;

import core.ClientInfo;

public class LocalVettingService implements VettingService {
	Map<String, Integer> pointsDB = new HashMap<String, Integer>();

	{
		pointsDB.put("PQR254/1", 0);
		pointsDB.put("ABC123/4", 2);
		pointsDB.put("XYZ567/9", 5);

	}

	@Override
	public boolean vetClient(ClientInfo info) {
		Integer value = pointsDB.get(info.licenseNumber);
		return value != null && (value == info.points);
	}

}
